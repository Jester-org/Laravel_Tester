<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // You can seed multiple users like this:
        User::factory()->create([
            'name' => 'admin',
            'password' => bcrypt('admin'), // Always hash passwords
        ]);

        User::factory()->create([
            'name' => 'jester',
            'password' => bcrypt('Jester'), // Always hash passwords
        ]);
    }
}
