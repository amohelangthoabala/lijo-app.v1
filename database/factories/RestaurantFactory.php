<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'phone' => $this->faker->phoneNumber,
            'address_id' => \App\Models\Address::factory(), // Assuming you have an Address factory
            'rating' => $this->faker->optional()->randomFloat(1, 1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
