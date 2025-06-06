<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run()
    {
        CategoryProduct::factory()->count(150)->create();
    }
}
