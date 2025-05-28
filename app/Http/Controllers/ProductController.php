<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Order;
use App\ShoppingCart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

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

                Stripe::setApiKey('sk_test_51RSKAx04dVDtB2GgwfzW1bewyPutz9R5r3ZnTnKR2ih08GPWFLr8dxv6ULYYLXV0OL7YEzg8c0NbSnM2JYmLtPOD00sLkPjb7s');

                try {
                    $stripe = new \Stripe\StripeClient('sk_test_51RSKAx04dVDtB2GgwfzW1bewyPutz9R5r3ZnTnKR2ih08GPWFLr8dxv6ULYYLXV0OL7YEzg8c0NbSnM2JYmLtPOD00sLkPjb7s');

                    $charge = $stripe->charges->create([
                        'amount' => $cart->totalPrice * 100, // because stripes works with cents
                        'currency' => 'usd',
                        'source' => $request->input('stripeToken'),
                    ]);
                } catch (\Exception $e) {
                    return redirect()->route('checkout')->with('error', $e->getMessage());
                }

                $order = new Order();
                $cart = new ShoppingCart(Session::get('cart'));

                $order->cart = serialize($cart);
                $order->address_id = 0; //$request->input('address');
                $order->name = $request->input('name');

                $order->payment = 666; //$charge->id;

//                Auth::user()->query()->orders()->save($order);
                \App\Models\Order::query()->create([
                    'user_id' => Auth::id(),
                    'address_id' => 1,
                    'name' => $request->input('name'),
                    'date' => new \DateTime('now'),
                    'title' => 'Ordine di Pippo',
                    'shipping_code' => '0',
                    'status' => 0,
                    'cart' => serialize($cart),
                ]);
//                \App\Models\Order::query()->where('user_id', Auth::id())->get();

                Session::forget('cart');
                return redirect()->route('marketplace.index')->with('success', 'Successfully purchased products!');
            }
        } catch (\Exception $exception) {
            return redirect()->route('checkout')->with('error', $exception->getMessage());
        }
    }
}
