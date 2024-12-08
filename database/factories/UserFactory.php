<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->randomElement([fake()->phoneNumber, null]),
            'address' => fake()->randomElement([fake()->address, null]),
            'password' => static::$password ??= Hash::make('password'),
            'role' => 'user',
            'balance' => fake()->numberBetween(0, 10000000),
            'current_cart_id' => null,
            'remember_token' => Str::random(10),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $carts = $user->cart();
            $carts->each(function (Cart $cart) use ($user) {
                if (!$cart->transaction()->exists()) {
                    $user->current_cart_id = $cart->id;
                    $user->save();
                    
                    return;
                }
            });
        });
    }
}
