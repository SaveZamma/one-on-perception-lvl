<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index() {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('marketplace.index', ["products" => $products]);
    }

    public function showProduct($id) {
        $product = Product::findOrFail($id);
        return view('marketplace.product', ["product" => $product]);
    }
}
