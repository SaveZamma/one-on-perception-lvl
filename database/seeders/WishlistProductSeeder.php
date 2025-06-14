<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\WishlistProduct;

class WishlistProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WishlistProduct::factory()->create([
            'user_id' => 1
        ]);
        WishlistProduct::factory()->count(10)->create();
    }
}
