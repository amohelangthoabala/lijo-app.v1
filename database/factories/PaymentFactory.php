<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => \App\Models\Order::inRandomOrder()->first()->id, // Assuming you have an Order factory
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Assuming you have a User factory
            'amount' => $this->faker->randomFloat(2, 10, 200),
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'payment_status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
