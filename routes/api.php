<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

Route::get('/restaurants', [RestaurantController::class, 'index']); // Get all restaurants
Route::get('/restaurants/{id}', [RestaurantController::class, 'show']); // Get a specific restaurant
Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'restaurants'], function () {
    Route::get('/', [RestaurantController::class, 'index']);
    Route::get('/{id}', [RestaurantController::class, 'show']);
    Route::put('/{id}', [RestaurantController::class, 'update']);
});
