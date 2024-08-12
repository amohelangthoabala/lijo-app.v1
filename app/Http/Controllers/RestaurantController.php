<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the restaurants.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json($restaurants);
    }

    /**
     * Display the specified restaurant.
     */
    public function show(string $id)
    {
        $restaurant = Restaurant::find($id);
        return response()->json($restaurant);
    }

    /**
     * Update the specified restaurent in storage.
     * possibly this will be used to rate restaurants...
     */
    public function update(Request $request, string $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->update($request->all());
        return response()->json($restaurant);
    }

}
