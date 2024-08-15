<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Logout route
    Route::post('/logout', [UserController::class, 'logout']);
    //get current user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    //create restaurants routes
    Route::group(['prefix' => 'restaurants'], function () {
        Route::get('/', [RestaurantController::class, 'index']);
        Route::get('/{id}', [RestaurantController::class, 'show']);
        Route::put('/{id}', [RestaurantController::class, 'update']);

        //create menu
        Route::group(['prefix' => '{restaurantId}/menu'], function () {
            Route::get('/{restuarantId}', [MenuController::class, 'index']);
            //Get all menu items
            Route::get('/item', [MenuController::class, 'items']);
            Route::get('/item/{id}', [MenuController::class, 'item']);
            Route::get('/{id}', [MenuController::class, 'show']);
            Route::put('/{id}', [MenuController::class, 'update']);
        });
    });



});




