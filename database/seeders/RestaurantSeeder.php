<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 Restaurants
        Restaurant::factory(10)->create()->each(function ($restaurant) {
            // Create two menus (Default Menu and Beverages Menu)
            $menus = Menu::factory(2)->create([
                'restaurant_id' => $restaurant->id,
            ]);

            // For each menu, create categories and meals
            $menus->each(function ($menu) {
                // Create 3 categories per menu
                $categories = MenuCategory::factory(3)->create([
                    'menu_id' => $menu->id,
                ]);

                // For each category, create 5 meals
                $categories->each(function ($category) {
                    Meal::factory(5)->create([
                        'category_id' => $category->id,
                    ]);
                });
            });
        });
    }
}
