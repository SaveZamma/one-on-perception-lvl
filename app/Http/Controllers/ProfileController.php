<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        return view('profile/profile');
    }

    public function myOrders() {
        $orders = Order::where('user_id', Auth::id());
        return view('profile/orders', ["orders" => $orders]);
    }
    
    public function myPayments() {
        $orders = Order::where('user_id', Auth::id())->pluck('id');
        $trans = Transaction::whereIn('order_id', $orders)->get();
        return view('profile/transactions', ["transactions" => $trans]);
    }

    
    public function myWishlist() {
        $products = $products = DB::table('wishlist_products')
            ->join('products', 'wishlist_products.product_id', '=', 'products.id')
            ->where('wishlist_products.user_id', Auth::id())
            ->select('products.*', 'wishlist_products.wishlist_id')
            ->get();
        $wishlistIDs = $products->pluck('wishlist_id');
        $wishlists = Wishlist::whereIn('id', $wishlistIDs)->get();
    
        return view('profile/wishlist', ["wishlists" => $wishlists, "products" => $products]);
    }
}
