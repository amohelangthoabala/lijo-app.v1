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

    public function updateFeaturedRestaurants()
    {
        // Get top-rated restaurants
        $topRated = Restaurant::where('rating', '>=', 4)->get();

        // Calculate sales volume for each restaurant and sort
        $topPerforming = $topRated->sortByDesc(function($restaurant) {
            return $restaurant->calculateSalesVolume();
        })->take(10); // Take the top 10 restaurants based on sales volume

        $newRestaurants = Restaurant::where('created_at', '>=', now()->subMonth())->get();

        // Merge collections and remove duplicates
        $featuredRestaurants = $topRated->merge($topPerforming)->merge($newRestaurants)->unique('id');

        // Update the is_featured field
        Restaurant::query()->update(['is_featured' => false]); // Reset all first
        foreach ($featuredRestaurants as $restaurant) {
            $restaurant->is_featured = true;
            $restaurant->save();
        }
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
