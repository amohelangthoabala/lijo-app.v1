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
            'name' => $this->faker->word(), // Random food name
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 50),
            // Use real food images from FoodiesFeed
            'image' => $this->faker->randomElement([
                'https://www.foodiesfeed.com/wp-content/uploads/2023/12/pizza-salami-on-a-wooden-table.jpg', // Example of a food image
                'https://www.foodiesfeed.com/wp-content/uploads/2023/05/pizza-salami.jpg', // Pasta
                'https://www.foodiesfeed.com/wp-content/uploads/2023/06/burger-with-melted-cheese.jpg', // Roasted chicken
                'https://www.foodiesfeed.com/wp-content/uploads/2023/06/pouring-honey-on-pancakes.jpg',  // Salad
                'https://www.foodiesfeed.com/wp-content/uploads/2023/08/grilled-crispy-pork-with-rice.jpg', // Chocolate cake
                'https://www.foodiesfeed.com/wp-content/uploads/2023/09/mexican-tacos-lined-up.jpg',
            ]),
            'category_id' => null, // Will be set during seeding
            'restaurant_id' => null, // Will be set during seeding
            'is_available' => $this->faker->boolean(),
            'preparation_time' => $this->faker->numberBetween(10, 60), // Preparation time in minutes
        ];
    }
}
