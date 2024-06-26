<?php

namespace Database\Factories;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => \App\Models\Order::factory(), // Assuming you have an Order factory
            'menu_id' => \App\Models\Menu::factory(), // Assuming you have a Menu factory
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
