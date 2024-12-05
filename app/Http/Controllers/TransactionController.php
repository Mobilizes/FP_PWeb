<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

    public function update(Request $request, int $id): JsonResponse
    {
        $validatedData = $request->validate([
            'status' => 'required|string|in:Pending,In Process,Failed,Finished',
        ]);

        $transaction = Transaction::find($id);
        $transaction->update($validatedData);

        return response()->json($transaction);
    }

    public function destroy(int $id): JsonResponse
    {
        $transaction = Transaction::find($id);
        $cart = Cart::find($transaction->cart_id);

        if ($cart->buyer_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if ($transaction->status === 'Failed') {
            $cart->buyer->balance += $cart->total_price;
        }

        $cart->delete();
        $transaction->delete();

        return response()->json(['message'=> ''], 0);
    }
}
