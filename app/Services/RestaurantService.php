<?php

namespace App\Services;

use App\Models\Address;
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
   // Fetch the restaurant by ID or throw an exception if not found
   $restaurant = Restaurant::findOrFail($id);

        // Fetch the address for the restaurant where it is not associated with a user
        $restaurantAddress = Address::where('user_id', $id)
                                    ->where('is_user', false)
                                    ->firstOrFail();

        return [
            'restaurant' => $restaurant,
            'address' => $restaurantAddress
        ];
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
