<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
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
            "title" => fake()->name(),
            "slug" => fake()->slug(),
            "stock" => fake()->numberBetween(10, 30),
            "monthly_price" => fake()->numberBetween(10, 100),
            "annual_price" => fake()->numberBetween(10, 100),
            "discount" => "20% off for your first Order",
            "ram" => fake()->numberBetween(1, 10),
            "disk" => fake()->numberBetween(1, 10),
            "operating_system" => "Windows 10",
            "bandwidth" => fake()->numberBetween(1, 10),
            "virtualization" => "none",
            "currency" => "$",
            "category_id" => 1,
            "country_id" => 1,
            "status" => "published",
            "freshIp" => 1,
            "freshIP_amount" => fake()->numberBetween(10, 100)
        ];
    }
}
