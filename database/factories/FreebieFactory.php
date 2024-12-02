<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class FreebieFactory extends Factory
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
            'donator_id' => User::factory(),
            'description' => fake()->randomElement([fake()->paragraph(), null]),
            'stock' => fake()->numberBetween(0, 100),
            'limit' => fake()->numberBetween(1, 10),
        ];
    }
}
