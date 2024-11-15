<?php

namespace App\Services;

use App\Models\Meal;
use App\Models\Menu;

class MenuService
{
    /**
     * Get all menus for a specific restaurant.
     */
    public function getMenusByRestaurantId($restaurantId)
    {
        return Menu::where('restaurant_id', $restaurantId)->get();
    }

    /**
     * Get a specific menu by its ID.
     */
    public function getMenuById($id)
    {
        return Menu::find($id);
    }

        /**
     * Get a specific menu by its ID.
     */
    public function getMealById($id)
    {
        // Eager load the category relationship
        $meal = Meal::with('category')->find($id);

        if (!$meal) {
            return null; // Or handle this case as needed (e.g., return an error message)
        }

        // Return the meal data along with the category name
        return [
            'id' => $meal->id,
            'category_id' => $meal->category_id,
            'category_name' => $meal->category ? $meal->category->name : null, // Get the category name
            'name' => $meal->name,
            'description' => $meal->description,
            'price' => $meal->price,
            'image' => $meal->image,
            'is_available' => $meal->is_available,
            'preparation_time' => $meal->preparation_time,
            'created_at' => $meal->created_at,
            'updated_at' => $meal->updated_at
        ];
    }
    /**
     * Update a menu by its ID.
     */
    public function updateMenu($id, $data)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $menu->update($data);
        }
        return $menu;
    }
}
