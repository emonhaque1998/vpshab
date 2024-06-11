<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
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
            'email' => "emonhaque.net@gmail.com",
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('Emon@1998'),
            'remember_token' => Str::random(10),
            'country' => fake()->country(),
            'stateName' => fake()->state(),
            'address' => fake()->cityPrefix(),
            'zipcode' => fake()->postcode(),
            'designation' => fake()->jobTitle(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

}
