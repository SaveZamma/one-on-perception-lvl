<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\OrderStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => UserFactory::new(),
            'address_id' => AddressFactory::new(),
            'name' => fake()->name,
            'date' => fake()->date(),
            'title' => fake()->name(),
            'shipping_code' => Str::random(10),
            'status' => fake()->randomElement(OrderStatus::cases())->value,
            'cart' => ''
        ];
    }
}
