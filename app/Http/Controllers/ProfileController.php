<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        if (Auth::check()) {
            return view('profile');
        } else {
            return view('login');
        }
    }
}
