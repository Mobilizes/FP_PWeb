<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Product;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $admin = fake()->randomElement([null, User::factory()->create(['role' => 'admin'])]);
        $product = $admin ? Product::factory()->create(['price' => 0]) : Product::factory()->create();
        $buyer = User::factory()->create();
        $status = $admin ? fake()->randomElement(['Accepted', 'Denied', 'In Process', 'Failed', 'Finished'])
                         : fake()->randomElement(['In Process', 'Failed', 'Finished']);
        
        return [
            'admin_id' => $admin->id,
            'buyer_id' => $buyer->id,
            'product_id' => $product->id,
            'quantity' => fake()->numberBetween(1, 10),
            'status' => $status,
        ];
    }
}
