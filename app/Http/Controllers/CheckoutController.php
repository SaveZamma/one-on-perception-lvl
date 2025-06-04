<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shopping-cart.index');
        } else {
            $cart = new ShoppingCart(Session::get('cart'));
            return view('shopping-cart.checkout', ['totalPrice' => $cart->totalPrice]);
        }
    }

    public function postCheckout(Request $request)
    {
        try {
            if (!Session::has('cart')) {
                return view('marketplace.index');
            } else {
                $cart = new ShoppingCart(Session::get('cart'));

                $address = new Address(
                    $request->input('country'),
                    $request->input('city'),
                    $request->input('street'),
                    $request->input('number'),
                    $request->input('zip')
                );

                Session::put('address', $address);

                $orderTitle = $request->input('title');
                if ($orderTitle == null || $orderTitle == '') {
                    $orderTitle = date('d-m-Y:H-i ').Auth::getUser()->username;
                }

                \App\Models\Order::query()->create([
                    'user_id' => Auth::id(),
                    'name' => Auth::getUser()->username,
                    'date' => new \DateTime('now'),
                    'title' => $orderTitle,
                    'shipping_code' => '0',
                    'status' => 0,
                    'cart' => serialize($cart),
                    'address' => serialize($address),
                ]);

                Session::forget('cart');
                Session::forget('address');
                return redirect()->route('profile.orders')->with('success', 'Successfully purchased products!');
            }
        } catch (\Exception $exception) {
            return redirect()->route('checkout')->with('checkout-error', $exception->getMessage());
        }
    }
}
