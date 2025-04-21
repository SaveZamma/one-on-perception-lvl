<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
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
        // $orders = Order::where('user_id', Auth::id())->pluck('id');
        // $trans = Transaction::whereIn('order_id', $orders)->get();
        return view('profile/wishlist');//, ["transactions" => $trans]);
    }
}
