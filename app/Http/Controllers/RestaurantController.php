<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Services\RestaurantService;

class RestaurantController extends Controller
{
    protected $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }
    /**
     * Display a listing of the restaurants.
     */
    public function index()
    {
        return response()->json($this->restaurantService->getAllRestaurants());
    }

    /**
     * Display the specified restaurant.
     */
    public function show(string $id)
    {
        return response()->json($this->restaurantService->getRestaurantById($id));
    }

    /**
     * Update the specified restaurent in storage.
     * possibly this will be used to rate restaurants...
     */
    public function update(Request $request, string $id)
    {
        $restaurant = $this->restaurantService->updateRestaurant($id, $request->all());
        return response()->json($restaurant);
    }

}
