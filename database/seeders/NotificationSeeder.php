<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notification::truncate();
        Notification::factory()->create([
            'user_id' => 1,
            'title' => 'Welcome to our platform',
            'text' => 'Thank you for joining our platform. We hope you enjoy your experience.',
            'read' => false
        ]);
        Notification::factory()->count(50)->create();
    }
}
