<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 🔥 Reset cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // =========================
        // Permissions
        // =========================
        $permissions = [
            'manage users',
            'manage roles',
            'manage permissions',
            'view dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // =========================
        // Roles
        // =========================
        $superAdmin = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $staff = Role::firstOrCreate([
            'name' => 'Staff',
            'guard_name' => 'web',
        ]);

        // =========================
        // Assign permissions
        // =========================
        $admin->syncPermissions([
            'manage users',
            'manage roles',
            'manage permissions',
            'view dashboard',
        ]);

        $staff->syncPermissions([
            'view dashboard',
        ]);

        // =========================
        // Assign Super Admin ke user pertama
        // =========================
        $user = User::first();

        if ($user && ! $user->hasRole('Super Admin')) {
            $user->assignRole('Super Admin');
        }
    }
}
