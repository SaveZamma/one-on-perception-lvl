<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistProduct;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MarketplaceController extends Controller
{
    public function index(Request $request) {
        $perPage = $request->get('perPage', 20);
        $search = $request->get('search', '');

        $categories = Category::all();

        $products = Product::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return view('marketplace.index', [
            "products" => $products,
            "categories" => $categories,
            "search" => $search,
        ]);
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
