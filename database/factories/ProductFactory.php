<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'seller_id' => User::factory(),
            'image_path' => fake()->imageUrl(),
            'description' => fake()->randomElement([fake()->paragraph(), null]),
            'price' => fake()->numberBetween(0, 10000000),
            'stock' => fake()->numberBetween(0, 100),
        ];
    }
}
