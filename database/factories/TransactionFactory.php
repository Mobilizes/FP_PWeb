<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        return [
            'cart_id' => Cart::factory(),
            'status' => 'Pending',
        ];
    }

    public function withCart(Cart $cart)
    {
        return $this->state(function (array $attributes) use ($cart) {
            return [
                'cart_id' => $cart->id,
            ];
        });
    }

    public function configure()
    {
        return $this->afterCreating(function (Transaction $transaction) {
            $cart = Cart::find($transaction->cart_id);
            $cart->transaction_id = $transaction->id;
            $cart->save();

            $sellers = $cart->products->pluck('seller_id')->unique();
            $transaction->sellers()->attach($sellers);
        });
    }
}
