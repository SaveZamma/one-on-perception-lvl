<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate(); 
        User::factory()->create([
            'username' => 'nicla123',
            'email' => 'Nicla_Pagliuca@libero.it',
            'password' => Hash::make('niclapagliuca'),
        ]);
        User::factory()->count(10)->create();
    }
}
