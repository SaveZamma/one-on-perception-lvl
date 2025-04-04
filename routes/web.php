<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

Route::get('/', function () { return view('landing'); })->name('landing');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');
Route::get('marketplace/{id}', [MarketplaceController::class, 'showProduct'])->name('marketplace.product');

// Protected routes (needs to be logged in)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('marketplace/my', [MarketplaceController::class, 'showProduct'])->name('marketplace.my');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::get('/Marketplace', function () {
    return view('marketplace');
});
