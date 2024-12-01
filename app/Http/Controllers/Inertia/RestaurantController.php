<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Http\Resources\RestaurantResource;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Restaurant::with(['meals.category', 'meals.reviews', 'menus', 'address', 'reviews.user']);

        $restaurants = $query->paginate(10);

        return inertia("Restaurant/Index", [
            "restaurants" => RestaurantResource::collection($restaurants),
            'queryParams' => request()->query() ?: null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $restaurant = Restaurant::with(['meals.category', 'menus', 'address', 'reviews.user'])->find($id);

        if (!$restaurant) {
            abort(404, 'Restaurant not found');
        }

        return inertia('Restaurant/Show', [
            'restaurant' => new RestaurantResource($restaurant),
            // "tasks" => TaskResource::collection($tasks),
            'queryParams' => request()->query() ?: null,
            'success' => session('success'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
