<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(5)->create();

        // Create 10 products and associate them with existing users
        Product::factory(10)->create()->each(function ($product) use ($users) {
            $product->seller_id = $users->random()->id;
            $product->save();
        });

        // Create 3 transactions and associate them with existing users and products
        Transaction::factory(3)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
