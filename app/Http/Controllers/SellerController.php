<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->shop) {
            return view('seller.dashboard');
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'email' => 'required|string|max:255',
            ]);

            if ($user->shop) {
                return redirect()->route('seller.dashboard')->with('error', 'You already have a shop.');
            }

            Shop::create([
                'user_id' => $user->id,
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'email' => $request->input('email'),
            ]);

            return redirect()->route('seller.dashboard')->with('success', 'Shop created successfully!');
        }

        return view('seller.become');
    }
}
