<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $isDealer = DB::table('dealers')->where('user_id', $userId)->exists();

        if ($isDealer) {
            return view('seller.dashboard');
        }

        return view('seller.become');
    }
}
