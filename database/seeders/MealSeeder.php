<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meals = [
            [
                'name' => 'Chicken Alfredo',
                'description' => 'A creamy pasta dish with tender chicken pieces, served with garlic bread and a side of veggies.',
                'price' => 15.99,
                'image' => 'https://www.themealdb.com/images/media/meals/8y7vpf1614249079.jpg', // Real image URL for Chicken Alfredo
                'category_id' => 1, // Adjust to an existing category ID
                'is_available' => true,
                'preparation_time' => 20,
            ],
            [
                'name' => 'Margherita Pizza',
                'description' => 'Classic pizza topped with fresh tomatoes, mozzarella, and basil leaves.',
                'price' => 12.49,
                'image' => 'https://www.themealdb.com/images/media/meals/wstvps1511787954.jpg', // Real image URL for Margherita Pizza
                'category_id' => 2, // Adjust to an existing category ID
                'is_available' => true,
                'preparation_time' => 15,
            ],
            [
                'name' => 'Grilled Salmon',
                'description' => 'Freshly grilled salmon served with a side of roasted potatoes and seasonal vegetables.',
                'price' => 18.99,
                'image' => 'https://www.themealdb.com/images/media/meals/ypxwxq1468234483.jpg', // Real image URL for Grilled Salmon
                'category_id' => 3, // Adjust to an existing category ID
                'is_available' => true,
                'preparation_time' => 25,
            ],
            [
                'name' => 'Caesar Salad',
                'description' => 'Crisp romaine lettuce tossed with Caesar dressing, croutons, and Parmesan cheese.',
                'price' => 9.99,
                'image' => 'https://www.themealdb.com/images/media/meals/58g3b81587611496.jpg', // Real image URL for Caesar Salad
                'category_id' => 4, // Adjust to an existing category ID
                'is_available' => true,
                'preparation_time' => 10,
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'description' => 'A decadent chocolate cake with a gooey molten center, served with vanilla ice cream.',
                'price' => 6.99,
                'image' => 'https://www.themealdb.com/images/media/meals/uwpsps1511383438.jpg', // Real image URL for Chocolate Lava Cake
                'category_id' => 5, // Adjust to an existing category ID
                'is_available' => true,
                'preparation_time' => 12,
            ],
        ];

        foreach ($meals as $meal) {
            Meal::create($meal);
        }
    }
}
