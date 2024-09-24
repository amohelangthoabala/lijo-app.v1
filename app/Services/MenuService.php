<?php

namespace App\Services;

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
    public function getMenuById($id, $restaurantId)
    {
        return Menu::where('restaurant_id', $restaurantId)->find($id);
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
