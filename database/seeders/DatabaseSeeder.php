<?php

namespace Database\Seeders;

use App\Models\Petugas;
use App\Models\Setting;
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

        $admin = User::where('username', 'admin')->first();
        Petugas::create([
            'nama_lengkap' => 'admin',
            'email' => 'admin@gmail.com',
            'user_id' => $admin->id,
        ]);

        $petugas = User::where('username', 'petugas')->first();
        Petugas::create([
            'nama_lengkap' => 'petugas',
            'email' => 'petugas@gmail.com',
            'user_id' => $petugas->id,
        ]);

        $user = User::where('username', 'user')->first();
        Petugas::create([
            'nama_lengkap' => 'user',
            'email' => 'user@gmail.com',
            'user_id' => $user->id,
        ]);

        Setting::create([
            'nama_sekolah' => 'babusallam',
            'nama_pimpinan' => 'Nadya'
        ]);
    }
}
