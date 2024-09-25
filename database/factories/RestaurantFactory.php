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
            'logo' => $this->faker->imageUrl(), // Example: URL to a logo image
            'image' => $this->faker->imageUrl(640, 480, 'food'), // or 'restaurant'
            'contact_information' => $this->faker->phoneNumber,
            'rating' => $this->faker->randomFloat(1, 0, 5), // Rating can be 0 to 5
            'opening_hours' => $this->faker->text(), // JSON format, adjust as needed
            'status' => $this->faker->randomElement(['open', 'closed']),
            'review_count' => $this->faker->numberBetween(0, 100),
            'order_count' => $this->faker->numberBetween(0, 100),
            'visit_count' => $this->faker->numberBetween(0, 100),
            'last_activity_at' => $this->faker->dateTimeThisYear(),
            'is_featured' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
