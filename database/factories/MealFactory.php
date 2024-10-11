<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    protected $model = Meal::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), // Assuming Faker has a food name provider
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 50),
            'image' => $this->faker->imageUrl(640, 480, 'food', true, 'meal'),
            'category_id' => null, // Will be set during seeding
            'is_available' => $this->faker->boolean(),
            'preparation_time' => $this->faker->numberBetween(10, 60), // Minutes
        ];
    }
}
