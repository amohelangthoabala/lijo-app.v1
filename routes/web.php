<?php

use App\Http\Controllers\Inertia\MealController;
use App\Http\Controllers\Inertia\OrderController;
use App\Http\Controllers\Inertia\RestaurantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Home page
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

// Redirect /dashboard to home
Route::get('/dashboard', function () {
    return redirect('/');
});

// Resources
Route::resource('meal', MealController::class);
Route::resource('order', OrderController::class);
Route::resource('restaurant', RestaurantController::class);

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
