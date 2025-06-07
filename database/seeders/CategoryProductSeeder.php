<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $products = Product::all();

        CategoryProduct::factory()->count(5)->create(['category_id' => $categories->random()->id, 'product_id' => $products->random()->id]);
    }
}
