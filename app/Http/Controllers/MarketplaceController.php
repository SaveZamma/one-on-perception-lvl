<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index() {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('marketplace.index', ["products" => $products]);
    }

    public function showProduct($id) {
        $product = Product::findOrFail($id);
        return view('marketplace.product', ["product" => $product]);
    }

    public function my() {
        return view('marketplace.my');
    }
}
