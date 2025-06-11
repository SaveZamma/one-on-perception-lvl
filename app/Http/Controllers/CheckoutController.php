<?php

namespace App\Http\Controllers;

use App\Address;
use App\Models\Shop;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private string $cartCookieName = 'shopping_cart';

    public function getCheckout()
    {
        if (!Cookie::has($this->cartCookieName)) {
            return view('shopping-cart.index');
        } else {
            $cart = new ShoppingCart(json_decode(Cookie::get($this->cartCookieName), true));
            return view('shopping-cart.checkout', ['totalPrice' => $cart->totalPrice]);
        }
    }

    public function postCheckout(Request $request)
    {
        try {
            if (!Cookie::has($this->cartCookieName)) {
                return view('marketplace.index');
            } else {
                $cart = new ShoppingCart(json_decode(Cookie::get($this->cartCookieName), true));

                $address = new Address(
                    $request->input('country'),
                    $request->input('city'),
                    $request->input('street'),
                    $request->input('number'),
                    $request->input('zip')
                );

                foreach ($cart->items as $item) {
                    $shop_id = $item['item']['shop_id'];
                    $shop = Shop::query()->find($shop_id);
                    $notificationController = new NotificationController();
                    $notificationController->sendNotificationTo('Purchase', "{$item['item']['name']} : {$item['qty']}", $shop->user_id);

                    $productController = new ProductController();
                    $productController->reduceByQty($item['item']['id'], $item['qty']);
                }

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

                Cookie::queue(Cookie::forget($this->cartCookieName));
                Session::forget('address');
                return redirect()->route('profile.orders')->with('success', 'Successfully purchased products!');
            }
        } catch (\Exception $exception) {
            return redirect()->route('checkout')->with('checkout-error', $exception->getMessage());
        }
    }
}
