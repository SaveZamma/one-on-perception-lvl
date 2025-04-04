<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class CategoryProductSeeder extends Seeder
{
    public function run()
    {
        // Example: attach random categories to products
        $categories = Category::all();

        Product::all()->each(function ($product) use ($categories) {
            // Attach 1 to 3 random categories to each product
            $product->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
