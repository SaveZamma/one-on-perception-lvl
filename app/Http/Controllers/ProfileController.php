<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        return view('profile/profile');
    }

    public function myOrders() {
        return view('profile/orders');
    }
}
