<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Freebie;

class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'admin_id' => User::factory()->create(['role' => 'admin']),
            'receiver_id' => User::factory(),
            'freebie_id' => Freebie::factory(),
            'quantity' => fake()->numberBetween(1, 10),
            'status' => fake()->randomElement(['Pending', 'Accepted', 'Denied', 'In Process', 'Failed', 'Finished']),
        ];
    }
}
