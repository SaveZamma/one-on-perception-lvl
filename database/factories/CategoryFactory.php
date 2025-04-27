<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['dice & accessories', 'miniatures', 'terrain & maps', 'rulebooks & guides', 'game master tools',
         'player aids', 'tokens & trackers', 'props & immersion', 'merchandise', 'painting & crafting', 'apps & software'];

        return [
            'name' => fake()->randomElement($categories),
            'description' => fake()->text(),
        ];
    }
}
