<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'username' => 'petugas',
            'password' => bcrypt('12345'),
            'role' => 'petugas',
        ]);
        User::factory()->create([
            'username' => 'user',
            'password' => bcrypt('12345'),
            'role' => 'user',
        ]);
    }
}
