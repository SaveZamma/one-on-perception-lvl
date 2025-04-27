<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function addToWishlist(Request $request) {
        $productId = $request->input('product_id');
        $wishlist = Wishlist::where('owner', Auth::id())->first();
        if (!$wishlist) {
            $wishlist = Wishlist::factory()->create([
                'name' => 'My Wishlist',
                'owner' => Auth::id(),
                'description' => '',
            ]);
        }
        WishlistProduct::factory()->create([
            'user_id' => Auth::id(),
            'wishlist_id' => $wishlist->id,
            'product_id' => $productId,
        ]);
        return response()->json([
            'status' => 'added'
        ]);
    }

    public function removeFromWishlist(Request $request) {
        $productId = $request->input('product_id');
        WishlistProduct::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->delete();
        return response()->json([
            'status' => 'removed',
            'product' => $productId
        ]);
    }
}
