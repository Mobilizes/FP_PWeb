<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(): JsonResponse
    {
        $carts = Cart::where('buyer_id', Auth::id())->get();
        return response()->json($carts);
    }

    public function storeAndAdd(Request $request): JsonResponse
    {
        // validate request data
        $data = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        $user = User::find(Auth::id());

        // create new cart if it doesn't exist for the current user
        if (!$user->current_cart_id) {
            $cart = new Cart();
            $cart->buyer_id = $user->id;
            $cart->save();

            $user->current_cart_id = $cart->id;
            $user->save();
        } else {
            $cart = Cart::find($user->current_cart_id);
        }

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $existingProduct = $cart->products()->where('product_id', $data['product_id'])->first();
        if ($existingProduct && $existingProduct->seller_id === $user->id) {
            return response()->json(['message' => 'Cannot buy your own product'], 404);
        }

        if ($existingProduct) {
            $cart->products()->updateExistingPivot($data['product_id'], [
                'quantity' => $existingProduct->pivot->quantity + $data['quantity']
            ]);
        } else if ($data['quantity'] > 0) {
            $cart->products()->attach($data['product_id'], ['quantity' => $data['quantity']]);
        } else {
            return response()->json(['message' => 'Product has invalid quantity'], 404);
        }

        return response()->json(['message' => 'Product added to cart'], 200);
    }

    public function showCurrentCart()
    {
        $user = User::find(Auth::id());

        if (!$user || !$user->current_cart_id) {
            return view('cart.show')->with('message', 'No current cart found');
        }
        
        $cart = Cart::find($user->current_cart_id);
        return view('cart.show', compact('cart'));
    }

    public function destroy(): JsonResponse
    {
        // delete cart

        $user = User::find(Auth::id());
        
        if (!$user->current_cart_id) {
            return response()->json(['message' => 'Cart does not exist'], 201);
        }
        
        $cart = Cart::find($user->current_cart_id);

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $cart->delete();

        $user->current_cart_id = null;
        $user->save();

        return response()->json(['message' => 'Cart deleted'], 201);
    }

    public function update(Request $request): JsonResponse
    {
        // update cart (modify products in cart)

        $data = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        $user = User::find(Auth::id());

        if (!$user->current_cart_id) {
            return response()->json(['message' => 'Cart does not exist'], 404);
        }

        $cart = Cart::find($user->current_cart_id);

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        if ($cart->transaction_id) {
            return response()->json(['message'=> 'Cart cannot be modified, because it has ongoing transaction'], 404);
        }

        $pivot = $cart->pivot->where('product_id', $data['product_id'])->first();

        if (!$pivot) {
            return response()->json(['message' => 'Cart does not have the requested product'], 404);
        }

        if ($data['quantity'] === 0) {
            // if its the last product in cart, remove the cart
            // otherwise, just remove the product from cart
            if ($cart->products->count() === 1) {
                $cart->delete();
                $user->current_cart_id = null;
                $user->save();

                return response()->json(['message' => 'Cart removed because there is no products left'], 200);
            }

            $cart->products()->detach($data['product_id']);

            return response()->json(['message' => 'Product removed from cart'], 200);
        }

        $pivot->quantity = $data['quantity'];

        return response()->json(['message' => 'Cart updated'], 200);
    }

    public function show(): JsonResponse
    {
        // show all products in cart

        $user = User::find(Auth::user()->id);

        if (!$user->current_cart_id) {
            return response()->json(['message' => 'Cart does not exist'], 404);
        }

        $cart = Cart::find($user->current_cart_id);

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $products = $cart->products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->pivot->quantity
            ];
        });

        return response()->json(['products' => $products]);
    }

    public function checkout(int $id): JsonResponse
    {
        /*
         * Buy all products in cart.
        */ 
        $cart = Cart::find($id);
        $user = $cart->buyer;

        if ($user->id != Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if ($user->balance < $cart->totalPrice()) {
            return response()->json(['message' => 'Not enough balance'], 401);
        }

        $user->balance -= $cart->totalPrice();
        $user->save();

        $transaction = new Transaction();
        $transaction->cart_id = $cart->id;
        $transaction->status = 'Pending';
        $transaction->save();

        $cart->transaction_id = $transaction->id;
        $cart->save();

        return response()->json($transaction);
    }

    public function checkCart(): JsonResponse {
        $user = Auth::user();
        $hasCart = $user && $user->current_cart_id ? true : false;
        $cart = Cart::find($user->current_cart_id);
        $productCount = $hasCart ? $cart->products()->count() : 0;
        return response()->json(['hasCart' => $hasCart, 'productCount' => $productCount]);
    }
}
