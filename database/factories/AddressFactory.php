<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country' => fake()->countryCode(),
            'city' => fake()->city(),
            'street' => fake()->streetName(),
            'number' => fake()->buildingNumber(),
            'zip' => fake()->postcode(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude()
        ];
    }
}
