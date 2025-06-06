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
        // Set cookie expiration to 7 days (in minutes)
        $expiration = 60 * 24 * 7;
        return Cookie::queue($this->cookieName, json_encode($cart), $expiration);
    }



    public function addToCart(Request $request, $id): RedirectResponse
    {
        $product = Product::query()->find($id);
        $cart = $this->getCartFromCookie();

        $cart->add($product, $product->id);

        $this->putCartToCookie($cart);
        return redirect()->route('marketplace.index');
    }

    public function reduceByOne($id)
    {
        $cart = $this->getCartFromCookie();
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            $this->putCartToCookie($cart);
        } else {
            Cookie::expire($this->cookieName);
        }

        return redirect()->route('shopping-cart');
    }

    public function removeItem($id)
    {
        $cart = $this->getCartFromCookie();
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            $this->putCartToCookie($cart);
        } else {
            Cookie::expire($this->cookieName);
        }

        return redirect()->route('shopping-cart');
    }

    public function getCart()
    {
        if (!Cookie::has($this->cookieName)) {
            return view('shopping-cart.index');
        } else {
            $cart = $this->getCartFromCookie();
            return view('shopping-cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        }
    }
}
