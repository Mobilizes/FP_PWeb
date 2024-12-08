<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        Product::factory(5)->create();

        Cart::factory(1)->create()->each(function ($cart) {
            $cart->buyer_id = 1;
            $cart->save();

            $products = Product::all();
            foreach ($products as $product) {
                $cart->products()->attach($product->id, ['quantity' => rand(1, 5)]);
            }
        });
        
        Product::factory(3)->create([
            'seller_id' => 1,
        ]);

        Cart::factory(1)->create()->each(function ($cart) {
            $products = Product::where('seller_id', 1)->get();
            foreach ($products as $product) {
                $cart->products()->attach($product->id, ['quantity' => rand(1, 5)]);
            }
        });

        User::where('id', 1)->update([
            'current_cart_id' => 1,
        ]);

        Transaction::factory(1)->withCart(Cart::find(1))->create();

        // for seller testing
        Transaction::factory(1)->withCart(Cart::find(2))->create();
    }
}
