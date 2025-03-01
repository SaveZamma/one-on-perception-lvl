<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderedProduct>
 */
class OrderedProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'product_id' => ProductFactory::new(),
            'order_id' => OrderFactory::new(),
            'storage_id' => StorageFactory::new(),
            'quantity' => random_int(1, 10)
        ];
    }
}
