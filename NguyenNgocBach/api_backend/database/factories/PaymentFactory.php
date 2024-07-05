<?php

namespace Database\Factories;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = \App\Models\Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'payment_date' => now(),
            'payment_amount' => $this->faker->randomFloat(2, 1, 1000),
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
        ];
    }
}
