<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'total_price' => $this->faker->numberBetween(10000, 500000),
            'description' => $this->faker->sentence(),
            'invoice_number' => 'INV-' . strtoupper(Str::random(10)),
            'payment_status' => $this->faker->randomElement(['paid', 'pending', 'failed']),
            'purchase_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'payment_date' => function (array $attributes) {
                return $attributes['payment_status'] === 'paid' ? $this->faker->dateTimeBetween($attributes['purchase_date'], 'now') : null;
            },
        ];
    }
}
