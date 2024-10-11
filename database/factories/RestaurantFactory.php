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
            'image' => $this->faker->imageUrl(640, 480, 'restaurant', true, 'food'), // or 'restaurant'
            'contact_information' => $this->generateContactInformation(),
            'rating' => $this->faker->randomFloat(1, 0, 5), // Rating can be 0 to 5
            'opening_hours' => $this->generateOperatingHours(), // JSON format, adjust as needed
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

    /**
     * Generate contact information as a JSON field.
     */
    private function generateContactInformation(): array
    {
        return [
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }


    /**
     * Generate random operating hours in a JSON format for a week.
     */
    private function generateOperatingHours(): array
    {
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $operatingHours = [];

        foreach ($days as $day) {
            $openHour = $this->faker->time('H:i', '10:00'); // Opening time between 06:00 and 10:00
            $closeHour = $this->faker->time('H:i', '23:00'); // Closing time between 18:00 and 23:00

            $operatingHours[$day] = [
                'open' => $openHour,
                'close' => $closeHour,
            ];
        }

        return $operatingHours;
    }
}
