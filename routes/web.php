<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SellerController;

Route::get('/', function () { return view('landing'); })->name('landing');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');
Route::get('marketplace/{id}', [MarketplaceController::class, 'showProduct'])->name('marketplace.product');
Route::get('/marketplace/product/{id}', [MarketplaceController::class, 'showProduct'])->name('marketplace.product');

Route::post('marketplace/wishlist/add', [MarketplaceController::class, 'addToWishlist'])->name('marketplace.wishlist.add');
Route::post('marketplace/wishlist/remove', [MarketplaceController::class, 'removeFromWishlist'])->name('marketplace.wishlist.remove');

// Protected routes (needs to be logged in)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/orders', [ProfileController::class, 'myOrders'])->name('profile.orders');
    Route::get('/profile/payments', [ProfileController::class, 'myPayments'])->name('profile.payments');
    Route::get('/profile/wishlist', [ProfileController::class, 'myWishlist'])->name('profile.wishlist');
    Route::get('/profile/notification', [ProfileController::class, 'myNotif'])->name('profile.notification');
    Route::get('/profile/wishlist/getUserWishlists', [ProfileController::class, 'getUserWishlists'])->name('profile.getUserWishlists');
    Route::get('marketplace/my', [MarketplaceController::class, 'showProduct'])->name('marketplace.my');
    Route::get('/seller/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});
