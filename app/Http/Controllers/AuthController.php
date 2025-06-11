<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister () {
        return view('auth.register');
    }

    public function register (Request $request) {
        $validated = $request->validate([
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = User::create($validated);
        Auth::login($user);

        Notification::create([
            'user_id' => $user->id,
            'title' => 'Welcome to our platform',
            'text' => 'Thank you for joining our platform. We hope you enjoy your experience.',
            'read' => true
        ]);

        return redirect()->intended('profile');
    }

    public function showLogin () {
        return view('auth.login');
    }

    public function login (Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('profile');
        }
        throw ValidationException::withMessages([
            'credentials' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (Cookie::has('shopping_cart')) {
            Cookie::expire('shopping_cart');
        }

        return redirect()->route('show.login');
    }
}
