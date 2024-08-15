<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/restaurants', [RestaurantController::class, 'index']); // Get all restaurants
Route::get('/restaurants/{id}', [RestaurantController::class, 'show']); // Get a specific restaurant
Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/**
 * TODO: Menu routes
 */
Route::group(['prefix' => 'restaurants'], function () {
    Route::get('/', [RestaurantController::class, 'index']);
    Route::get('/{id}', [RestaurantController::class, 'show']);
    Route::put('/{id}', [RestaurantController::class, 'update']);
});
Route::group(['prefix' => 'menu'], function () {
    Route::get('/', [MenuController::class, 'index']);
    //Get all menu items
    Route::get('/item', [MenuController::class, 'items']);
    Route::get('/item/{id}', [MenuController::class, 'item']);
    Route::get('/{id}', [MenuController::class, 'show']);
    Route::put('/{id}', [MenuController::class, 'update']);
});
