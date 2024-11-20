<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/explore', 'explore')->name('explore');

Route::view('/cart', 'cart')->name('cart');

Route::view('/details', 'meal')->name('details');

Route::get('/docs', function () {
    return view('venodr.index');
});
