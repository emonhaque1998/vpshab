<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "orderId" => "666addd83ec5e",
            "status" => "Paid",
            "user_id" => 1,
            "quantity" => 1,
            "product_id" => 1,
            "totalAmount" => 50,
        ];
    }
}
