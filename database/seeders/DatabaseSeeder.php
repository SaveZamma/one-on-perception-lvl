<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* If you've changed lots of tables, you can run a brand new migration using the
 * command `php artisan migrate:fresh --seed`. This will drop all tables from
 * the database, re-run all migrations, and re-seed the database.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Reference the other seeders that must be called
        $this->call([
            ShopSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
