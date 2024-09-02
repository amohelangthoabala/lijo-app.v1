<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(), // Assuming you have a User factory
            'restaurant_id' => \App\Models\Restaurant::inRandomOrder()->first()->id,
            'address_id' => \App\Models\Address::factory(), // Assuming you have an Address factory
            'total_amount' => $this->faker->randomFloat(2, 20, 200),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
