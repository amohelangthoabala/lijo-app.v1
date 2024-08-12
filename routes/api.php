<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

Route::get('/restaurants', [RestaurantController::class, 'index']); // Get all restaurants
// Route::post('/restaurants', [RestaurantController::class, 'store']); // Create a new restaurant
// Route::get('/restaurants/{id}', [RestaurantController::class, 'show']); // Get a specific restaurant
// Route::put('/restaurants/{id}', [RestaurantController::class, 'update']); // Update a restaurant
Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
