<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishlistProduct;
use Illuminate\Support\Facades\Auth;

class MarketplaceController extends Controller
{
    public function index() {
        $products = Product::query()->orderBy('created_at', 'desc')->paginate(10);
        return view('marketplace.index', ["products" => $products]);
    }

    public function showProduct($id) {
        $product = Product::query()->findOrFail($id);
        $wishlist = WishlistProduct::where('user_id', Auth::id())->get();
        $isInWishlist = $wishlist->contains('product_id', $id);
        return view('marketplace.product', ["product" => $product, "isWishlist" => $isInWishlist]);
    }

    public function my() {
        return view('marketplace.my');
    }
}
