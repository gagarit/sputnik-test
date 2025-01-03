<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\WishlistController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [ MyUserController::class, 'index']);
Route::post('/users', [ MyUserController::class, 'store']);

Route::get('/places', [ PlaceController::class, 'index']);
Route::post('/places', [ PlaceController::class, 'store']);
Route::get('/places/{place}', [ PlaceController::class, 'show']);

Route::post('/wishlist/add', [WishlistController::class, 'add']);
Route::get('/wishlist/{userId}', [WishlistController::class, 'getWishlist']);
