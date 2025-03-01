<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\Boolean;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoredProduct>
 */
class StoredProductFactory extends Factory
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
            'storage_id' => StorageFactory::new(),
            'quantity' => random_int(0, 100),
            'price' => rand(0, 1000) /  mt_getrandmax(),
            'currency' => fake()->currencyCode(),
            'new' => boolval(random_int(0, 1)),
            'visible' => boolval(random_int(0, 1)),
        ];
    }

    public function used(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'new' => false,
            ];
        });
    }
}
