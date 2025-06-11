<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\ShoppingCart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
        if ($this->allowAddToCart($id)) {
            $product = Product::query()->find($id);
            $cart = $this->getCartFromCookie();

            $cart->add($product, $product->id);

            $this->putCartToCookie($cart);

            return redirect()->route('marketplace.index');
        } else {
            return redirect()->back()->with('error', 'Product out of stock');
        }
    }

    public function increaseByOne($id): RedirectResponse
    {
        if ($this->allowAddToCart($id)) {
            $product = Product::query()->find($id);
            $cart = $this->getCartFromCookie();

            $cart->add($product, $product->id);

            $this->putCartToCookie($cart);
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Product out of stock');
        }
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

        return redirect()->back();
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

        return redirect()->back();
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

    private function allowAddToCart($product_id): bool
    {
        $cart = $this->getCartFromCookie();
        if (!!$cart->items && array_key_exists($product_id, $cart->items)) {
            $qty = $cart->items[$product_id]['qty'] + 1;
        } else {
            $qty = 1;
        }

        $productController = new ProductController();
        return $productController->allowPick($product_id, $qty);
    }
}
