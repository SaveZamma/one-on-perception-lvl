<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

$isLogged = false;

Route::get('/', function () {
    return view('landing');
})->name('landing');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');


Route::get('marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');

// Laravel reads the routes from top to down
// if the product route were to be put above the orders, the program would have
// redirected the user to the product page using "orders" as the id
Route::get('marketplace/my', function () {
    return view('marketplace.my');
})->name('marketplace.my');
Route::get('marketplace/{id}', [MarketplaceController::class, 'showProduct'])->name('marketplace.product');

