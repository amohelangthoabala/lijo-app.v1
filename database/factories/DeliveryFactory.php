<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Delivery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => \App\Models\Order::inRandomOrder()->first()->id, // Assuming you have an Order factory
            'address_id' => \App\Models\Address::inRandomOrder()->first()->id, // Assuming you have an Address factory
            'delivery_status' => $this->faker->randomElement(['pending', 'shipped', 'delivered', 'cancelled']),
            'delivery_time' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
