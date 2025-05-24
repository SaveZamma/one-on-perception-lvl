<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SellerController;

Route::get('/', function () { return view('landing'); })->name('landing');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');
Route::get('marketplace/{id}', [MarketplaceController::class, 'showProduct'])->name('marketplace.product');
Route::get('/marketplace/product/{id}', [MarketplaceController::class, 'showProduct'])->name('marketplace.product');

// Protected routes (needs to be logged in)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/orders', [ProfileController::class, 'myOrders'])->name('profile.orders');
    Route::get('/profile/payments', [ProfileController::class, 'myPayments'])->name('profile.payments');
    Route::get('/profile/wishlist', [ProfileController::class, 'myWishlist'])->name('profile.wishlist');
    Route::get('/profile/notification', [ProfileController::class, 'myNotif'])->name('profile.notification');
    Route::post('/notification/toggleRead', [NotificationController::class, 'toggleReadNotification'])->name('notification.toggle');
    Route::post('/notification/delete', [NotificationController::class, 'deleteNotification'])->name('notification.delete');
    Route::get('/profile/wishlist/getUserWishlists', [ProfileController::class, 'getUserWishlists'])->name('profile.getUserWishlists');
    Route::post('marketplace/wishlist/add', [MarketplaceController::class, 'addToWishlist'])->name('marketplace.wishlist.add');
    Route::post('marketplace/wishlist/remove', [MarketplaceController::class, 'removeFromWishlist'])->name('marketplace.wishlist.remove');
    Route::get('marketplace/my', [MarketplaceController::class, 'showProduct'])->name('marketplace.my');
    Route::match(['get', 'post'], '/seller', [SellerController::class, 'index'])->middleware('auth')->name('seller.dashboard');
    Route::get('/checkout', [\App\Http\Controllers\ProductController::class, 'getCheckout'])->name('checkout');
    Route::post('/checkout', [\App\Http\Controllers\ProductController::class, 'postCheckout'])->name('checkout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});


Route::get('shopping-cart', [\App\Http\Controllers\ProductController::class, 'getCart'])->name('shopping-cart');
Route::get('add-to-cart/{id}', [\App\Http\Controllers\ProductController::class, 'addToCart'])->name('product.addToCart');


