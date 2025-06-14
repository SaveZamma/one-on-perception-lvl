<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Wishlist;
use App\Models\WishlistProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        return view('profile/profile');
    }

    public function myOrders() {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('profile/orders', ["orders" => $orders]);
    }
    
    public function myPayments() {
        $orders = Order::where('user_id', Auth::id())->pluck('id');
        $trans = Transaction::whereIn('order_id', $orders)->get();
        return view('profile/transactions', ["transactions" => $trans]);
    }
    
    public function myNotif() {
        $notifs = Notification::where('user_id', Auth::id())->get();
        return view('profile/notifications', ["notifications" => $notifs]);
    }

    public function myWishlist() {
        $products = $products = DB::table('wishlist_products')
            ->join('products', 'wishlist_products.product_id', '=', 'products.id')
            ->where('wishlist_products.user_id', Auth::id())
            ->select('products.*', 'wishlist_products.wishlist_id')
            ->get();
        // $wishlistIDs = $products->pluck('wishlist_id');
        $wishlists = Wishlist::where('owner', Auth::id())->get();
    
        return view('profile/wishlist', ["wishlists" => $wishlists, "products" => $products]);
    }


    public function getUserWishlists() {
        $wishlist = Wishlist::where('owner', Auth::id())->get();
        $wishlistProducts = WishlistProduct::where('user_id', Auth::id())->get();
        return response()->json([
            'wishlist' => json_encode($wishlist),
            'wishlistProducts' => json_encode($wishlistProducts),
        ]);
    }
}
