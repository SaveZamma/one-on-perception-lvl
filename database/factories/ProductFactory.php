<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productTemplate = ["dice set", "metal dice", "glow-in-the-dark dice", "dice bag", "leather dice tray", "wooden dice tower", "custom dice vault", "acrylic dice set", "gemstone dice", "resin dice", "dice jail", "dice display case",
            "miniature human fighter", "miniature elf wizard", "miniature dwarf cleric", "miniature orc barbarian", "painted dragon miniature", "gelatinous cube miniature", "beholder miniature", "mind flayer miniature", "goblin miniature",
            "skeleton miniature", "kobold miniature", "vampire miniature", "lich miniature", "werewolf miniature", "zombie horde miniature", "tiefling rogue miniature", "halfling bard miniature", "dragonborn paladin miniature", "warforged monk miniature",
            "dungeon master screen", "initiative tracker", "combat tracker board", "spell card deck", "magic item cards", "condition rings", "status tokens", "area of effect template", "wet erase battle mat", "hex grid mat", "3D terrain pieces",
            "dungeon tiles", "forest terrain set", "lava terrain pack", "modular dungeon walls", "cave terrain kit", "ship map poster", "castle siege map", "city street tiles", "swamp terrain base", "ruins terrain set",
            "core rulebook", "player's handbook", "dungeon master's guide", "monster manual", "campaign module", "one-shot adventure book", "character sheet pad", "custom character sheets", "homebrew campaign guide",
            "game master notes journal", "leather-bound notebook", "initiative cards", "quest cards", "custom campaign planner", "lore compendium", "map folio", "DM cheat sheet",
            "RPG-themed t-shirt", "critical hit mug", "natural 20 pin", "D20 keychain", "RPG enamel pin set", "spellbook phone case", "dice-themed stickers", "mimic plushie", "beholder plush", "dragon hoodie", "critical fail socks",
            "player token set", "plastic condition markers", "magnetic base rings", "inspiration tokens", "XP tracker coins", "damage dials", "dry erase tokens",
            "resin spell effects", "fireball effect template", "fog of war overlay", "light aura template", "flying base adapter", "magic trap markers",
            "spell scroll prop", "alchemy potion bottles", "treasure chest prop", "puzzle box", "locked chest mini prop", "hand-drawn map scroll", "RPG-themed coasters",
            "tarot-style fate deck", "fortune cards", "riddle book", "dungeon puzzle cards", "NPC card deck", "voice modulator for roleplay",
            "player journal", "campaign logbook", "party inventory sheet", "initiative tracker app", "dice rolling app", "virtual battle map software",
            "foldable dice tower", "custom mini painting kit", "dry brush set", "acrylic paints for minis", "miniature primer spray", "modeling putty", "RPG encounter builder tool"
        ];
        $colors = ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'pink', 'black', 'white', 'gray',
            'brown', 'cyan', 'magenta', 'turquoise', 'gold', 'silver', 'bronze', 'copper', 'maroon', 'navy',
            'lavender', 'beige', 'ivory', 'charcoal', 'cream', 'teal', 'mint', 'peach', 'coral', 'plum',
            'crimson', 'amber', 'lime', 'jade', 'indigo', 'scarlet', 'sapphire', 'emerald', 'ruby', 'topaz',
            'amethyst', 'periwinkle', 'chartreuse', 'azure', 'aquamarine', 'rose', 'ochre', 'taupe', 'sepia', 'sand',
            'mocha', 'espresso', 'mahogany', 'hazel', 'slate', 'steel', 'smoke', 'pearl', 'onyx', 'obsidian',
            'glacier blue', 'storm gray', 'sunset orange', 'dawn pink', 'twilight purple', 'moss green', 'forest green', 'sky blue', 'midnight blue', 'ash gray',
            'cobalt', 'gunmetal', 'rust', 'clay', 'sunflower', 'flame red', 'ice blue', 'ghost white', 'frost', 'blush',
            'banana yellow', 'seafoam green', 'ocean blue', 'storm blue', 'space black', 'nebula purple', 'crystal white', 'plague green', 'bone white', 'magma red',
            'void black', 'blood red', 'ether gray', 'arcane violet', 'shadow blue', 'phantom black', 'spirit green', 'soul silver', 'dragon scale green', 'inferno orange',
            'elven gold', 'dwarven bronze', 'orcish green', 'troll hide brown', 'goblin gray', 'lich purple', 'angelic white', 'demonic red', 'celestial blue', 'feywild pink'
        ];

        return [
            "name" => fake()->randomElement($colors) . " " . fake()->randomElement($productTemplate),
            "description" => fake()->text(),
            "imagePath" => "https://picsum.photos/500/300?random=" . fake()->unique()->randomNumber(),
            'shop_id' => ShopFactory::new(),
            'quantity' => random_int(0, 100),
            'price' => rand(0, 10000) / 100,
            'currency' => fake()->currencyCode(),
            'new' => boolval(random_int(0, 1)),
            'visible' => boolval(random_int(0, 1)),
        ];
    }
}
