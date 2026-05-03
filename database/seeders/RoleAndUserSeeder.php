<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Permission
        Permission::firstOrCreate(['name' => 'view medicines']);
        Permission::firstOrCreate(['name' => 'create medicines']);
        Permission::firstOrCreate(['name' => 'edit medicines']);
        Permission::firstOrCreate(['name' => 'delete medicines']);

        // 2. Buat Role Manager - bisa semua
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $managerRole->givePermissionTo(Permission::all());

        // 3. Buat Role Staff - hanya view dan edit stok
        $staffRole = Role::firstOrCreate(['name' => 'staff']);
        $staffRole->givePermissionTo(['view medicines', 'edit medicines']);

        // 4. Buat User
        $manager = User::firstOrCreate(
            ['email' => 'manager@example.com'],
            ['name' => 'Manager User', 'password' => Hash::make('password')]
        );
        $manager->assignRole($managerRole);

        $staff = User::firstOrCreate(
            ['email' => 'staff@example.com'],
            ['name' => 'Staff User', 'password' => Hash::make('password')]
        );
        $staff->assignRole($staffRole);
    }
}