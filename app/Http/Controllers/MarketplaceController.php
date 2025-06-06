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
        $query = Product::query();
        $categories = $request->input('category', []);

        if (is_array($categories) && !in_array('all', $categories) && count($categories) > 0) {
            $query->whereHas('categories', function ($q) use ($categories) {
                $q->whereIn('categories.id', $categories);
            });
        }

        if ($request->filled('search')) {
            $query->where('name', 'ILIKE', '%' . $request->input('search') . '%');
        }

        $perPage = (int) $request->input('perPage', 24);
        $products = $query->paginate($perPage)->appends($request->except('page'));

        $categories = Category::all();
        return view('marketplace.index', compact('products', 'categories'));
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
