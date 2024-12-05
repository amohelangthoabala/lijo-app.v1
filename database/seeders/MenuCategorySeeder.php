<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuCategory;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run()
     {
         $categories = [
             [
                 'name' => 'Appetizers',
                 'description' => 'Start your meal with a delicious appetizer.',
                 'menu_id' => 1, // Replace with actual menu ID
             ],
             [
                 'name' => 'Main Courses',
                 'description' => 'Hearty and filling main dishes for every taste.',
                 'menu_id' => 1,
             ],
             [
                 'name' => 'Desserts',
                 'description' => 'Sweet treats to finish your meal.',
                 'menu_id' => 1,
             ],
             [
                 'name' => 'Beverages',
                 'description' => 'A variety of drinks to complement your meal.',
                 'menu_id' => 1,
             ],
             [
                 'name' => 'Specials',
                 'description' => 'Exclusive dishes available for a limited time.',
                 'menu_id' => 1,
             ],
         ];

         foreach ($categories as $category) {
             MenuCategory::create($category);
         }
     }
}
