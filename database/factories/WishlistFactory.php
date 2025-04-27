<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class WishlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $wishlistNames = [
            'My Adventurer’s Gear', 'Dungeon Delights', 'Critical Needs', 'Epic Loot Wishlist', 'Treasure Hoard', 'DM Must-Haves', 'Character Creation Kit', 'Mini Mania', 'The Dice Vault', 'Battle Prep List',
            'Campaign Essentials', 'Future Loot', 'Fantasy Favorites', 'Loot Bag', 'Shopping Scroll', 'The Wish Scroll', 'Magic Item Wishlist', 'Player’s Pack', 'My Game Night Gear', 'Ready for the Quest',
            'RPG Dream List', 'Tabletop Toolkit', 'Tavern Trinkets', 'Combat Kit', 'The Ultimate Loadout', 'My Loot Wishlist', 'Arcane Artifacts', 'Roll for Retail', 'Shop of Holding', 'Tools of the Trade',
            'One More Thing...', 'The Bag of Holding List', 'Gifts from the Gods', 'Future Familiar Finds', 'My Nerdy Wishlist', 'Rolling in Style', 'Quest Prep List', 'Initiative Upgrades', 'Fantasy Finds',
            'Next Character Build', 'Immersion Pack', 'DM’s Vault', 'Minis & Maps', 'The Dice Goblin’s List', 'Wishlist of Wonder', 'Wish Upon a d20', 'Loot Crate Dreams', 'The Collector’s Cache',
            'Player’s Pick', 'Master Wishlist', 'Legendary Wishlist', 'Campaign Wishlist', 'Inventory Wishlist', 'The Shopping Quest', 'Must-Buy Magic', 'The Hoarder’s List', 'Shopkeeper’s Choice'
        ];
        return [
            'name' => fake()->randomElement($wishlistNames),
            'description' => fake()->text(),
            'owner' => UserFactory::new()
        ];
    }
}
