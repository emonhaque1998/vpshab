<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "email" => fake()->email(),
            "phone" => fake()->phoneNumber(),
            "amount" => fake()->numberBetween(10, 50),
            "address" => fake()->address(),
            "status" => "Processing",
            "transaction_id" => "666addd7032a7",
            "currency" => "$",
            "product_id" => 1,
            "user_id" => 1,
            "invoice_id" => 1,
            "orderID" => "189",
        ];
    }
}
