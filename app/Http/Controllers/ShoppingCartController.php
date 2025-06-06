<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\ShoppingCart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    private string $cookieName = 'shopping_cart';

    private function getCartFromCookie(): ShoppingCart
    {
        $cart = Cookie::get($this->cookieName);
        return new ShoppingCart($cart ? json_decode($cart, true) : null);
    }

    private function putCartToCookie(ShoppingCart $cart)
    {
        // Set cookie expiration to, for example, 7 days (in minutes)
        $expiration = 60 * 24 * 7;

        return Cookie::queue($this->cookieName, json_encode($cart), $expiration);
    }



    public function addToCart(Request $request, $id): RedirectResponse
    {
        $product = Product::query()->find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $oldCartCC = $this->getCartFromCookie();

        $cart = new ShoppingCart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        $this->putCartToCookie($cart);

        dd($this->getCartFromCookie());

        return redirect()->route('marketplace.index');
    }

    public function reduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new ShoppingCart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('shopping-cart');
    }

    public function removeItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new ShoppingCart($oldCart);

        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('shopping-cart');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shopping-cart.index');
        } else {
            $cart = new ShoppingCart(Session::get('cart'));
            return view('shopping-cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        }
    }
}
