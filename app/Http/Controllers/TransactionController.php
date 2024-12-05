<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showBuyer(): JsonResponse
    {
        $carts = Cart::where("buyer_id", Auth::id());
        $transactions = $carts->pluck('transaction')->filter();

        return response()->json($transactions);
    }

    public function showSeller(): JsonResponse
    {
        $transactions = Transaction::whereHas('cart.products', function ($query) {
            $query->where('seller_id', Auth::id());
        })->get();

        return response()->json($transactions);
    }

    public function sellerInProgress(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'transaction_id' => 'required|integer',
            'accept' => 'required|boolean',
        ]);

        $user = User::find(Auth::id());
        $transaction = Transaction::find($validatedData['transaction_id']);
        
        $sellers = $transaction->sellers;
        if (!$sellers->contains($user)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $pivot = $transaction->sellers()->where('seller_id', $user->id)->first()->pivot;
        if ($pivot->approved) {
            return response()->json(['message' => 'Seller already approved this transaction'], 200);
        }

        if ($validatedData['accept'] === false) {
            // Remove all products that are sold by seller from cart
            $cart = $transaction->cart;
            $products = $cart->products()->where('seller_id', $user->id)->get();
            
            foreach ($products as $product) {
                $cart->products()->detach($product->id);
            }
            
            // If the removal causes the cart to be empty, set the transaction status to 'Failed'
            if ($cart->products()->count() === 0) {
                $transaction->status = 'Failed';
                $transaction->save();

                return response()->json(['message' => 'Transaction set to Failed.'], 200);
            }

            return response()->json(['message' => 'Seller denied, deleted seller\'s products from transaction'], 200);
        }

        $transaction->status = 'In Progress';
        $transaction->save();

        return response()->json(['message' => 'Transaction set to In Progress.'], 200);
    }

    public function clientFinished(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'transaction_id'=> 'required|integer',
        ]);

        $user = User::find(Auth::id());
        $transaction = Transaction::find($validatedData['transaction_id']);

        if (!$transaction->sellers->contains($user)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if ($transaction->status === 'Pending') {
            return response()->json(['message' => 'Transaction is not yet approved!'], 401);
        }

        if ($transaction->status === 'Failed') {
            return response()->json(['message' => 'Transaction is already failed!'], 401);
        }

        $transaction->status = 'Finished';
        $transaction->save();

        return response()->json(['message' => 'Transaction set to Finished.'], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $transaction = Transaction::find($id);
        $cart = Cart::find($transaction->cart_id);

        if ($cart->buyer_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if ($transaction->status === 'Failed') {
            $cart->buyer->balance += $cart->totalPrice;
        }

        $cart->delete();
        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted successfully'], 200);
    }
}
