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
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 50),
            'image' => $this->getRandomImageFromStorage(), // Use a local image
            'category_id' => null, // Will be set during seeding
            'restaurant_id' => null, // Will be set during seeding
            'is_available' => $this->faker->boolean(),
            'preparation_time' => $this->faker->numberBetween(10, 60),
        ];
    }

    /**
     * Retrieve a random image from the storage directory.
     *
     * @return string
     */
    private function getRandomImageFromStorage(): string
    {
        $images = [
            '1.jpg',
            '2.jpg',
            '3.jpg',
            '4.jpg',
            '5.jpg',
            '6.jpg',
            '7.jpg',
            '8.jpg',
            '9.jpg',
            '10.jpg',
        ];

        $imageName = $this->faker->randomElement($images);

        // Adjust the path prefix based on where your images are stored
        // Assuming the images are located in public/storage/images/meals
        return 'storage/images' . $imageName;
    }
}
