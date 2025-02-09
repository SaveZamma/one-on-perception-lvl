<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ProfileController;

$isLogged = false;

Route::get('/', function () {
    return view('landing');
});
Route::get('login', function () {
    return view('login', ["greeting" => "Hello"]);
});
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');


Route::get('marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');

// Laravel reads the routes from top to down
// if the product route were to be put above the orders, the program would have
// redirected the user to the product page using "orders" as the id
Route::get('marketplace/my', function () {
    return view('marketplace.my');
})->name('marketplace.my');
Route::get('marketplace/{id}', [MarketplaceController::class, 'showProduct'])->name('marketplace.product');

