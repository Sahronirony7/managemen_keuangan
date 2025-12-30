<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // Buat USER SUPER ADMIN
        // =========================
        User::firstOrCreate(
            ['email' => 'admin@yayasan.local'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );

        // =========================
        // Seeder lainnya
        // =========================
        $this->call([
            RolePermissionSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
