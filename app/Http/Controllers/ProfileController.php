<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        return view('profile/profile');
    }

    public function myOrders() {
        $orders = Order::all()->where('user_id', Auth::user()->id);
        return view('profile/orders', ["orders" => $orders]);
    }
}
