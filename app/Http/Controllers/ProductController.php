<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

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
        $categories = Category::all();
        return view('seller.product-editor', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'currency' => 'required|string|max:3',
            'category' => 'array',
            'category.*' => 'exists:categories,id',
        ]);

        $user = auth()->user();
        $shop = $user->shop;

        if (!$shop) {
            return redirect()->route('seller.dashboard')->with('error', 'You must have a shop to add products.');
        }

        $product = new Product();
        $product->shop_id = $shop->id;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->currency = $request->input('currency');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->imagePath = $path;
        }
        $product->save();

        // Attach categories
        if ($request->has('category')) {
            $product->categories()->sync($request->input('category'));
        }

        return redirect()->route('seller.dashboard')->with('success', 'Product added!');
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
        $categories = Category::all();
        $selectedCategories = $product->categories()->pluck('id')->toArray();
        return view('seller.product-editor', compact('product', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'currency' => 'required|string|max:3',
            'category' => 'array',
            'category.*' => 'exists:categories,id',
        ]);

        $user = auth()->user();
        $shop = $user->shop;

        if (!$shop || $product->shop_id !== $shop->id) {
            return redirect()->route('seller.dashboard')->with('error', 'Unauthorized action.');
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->currency = $request->input('currency');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->imagePath = $path;
        }
        $product->save();

        // Sync categories
        if ($request->has('category')) {
            $product->categories()->sync($request->input('category'));
        } else {
            $product->categories()->sync([]);
        }

        return redirect()->route('seller.dashboard')->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $user = auth()->user();
        $shop = $user->shop;

        // Ensure the product belongs to the user's shop
        if (!$shop || $product->shop_id !== $shop->id) {
            return redirect()->route('seller.dashboard')->with('error', 'Unauthorized action.');
        }

        $product->delete();

        return redirect()->route('seller.dashboard')->with('success', 'Product deleted successfully!');
    }
}
