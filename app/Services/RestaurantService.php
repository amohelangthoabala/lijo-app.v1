<?php

namespace App\Services;

use App\Models\Restaurant;

class RestaurantService
{
    public function getAllRestaurants()
    {
        return Restaurant::all();
    }

    public function createRestaurant(array $data)
    {
        return Restaurant::create($data);
    }

    public function getRestaurantById($id)
    {
        return Restaurant::findOrFail($id);
    }

    public function updateRestaurant($id, array $data)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($data);
        return $restaurant;
    }

    public function deleteRestaurant($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return $restaurant->delete();
    }
}
