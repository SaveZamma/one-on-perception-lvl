<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\ShoppingCart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request, $id): RedirectResponse {
        $product = Product::query()->find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new ShoppingCart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('marketplace.index');
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
