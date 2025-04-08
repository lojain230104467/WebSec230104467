<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Delete existing roles and permissions
        Role::query()->delete();
        Permission::query()->delete();

        // Create permissions
        $permissions = [
            'add_products',
            'edit_products',
            'delete_products',
            'manage_customers',
            'show_users',
            'edit_users',
            'delete_users',
            'admin_users'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $customerRole = Role::create(['name' => 'Customer', 'guard_name' => 'web']);
        
        $employeeRole = Role::create(['name' => 'Employee', 'guard_name' => 'web']);
        $employeeRole->givePermissionTo([
            'add_products',
            'edit_products',
            'delete_products',
            'manage_customers',
            'show_users'
        ]);

        $adminRole = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $adminRole->givePermissionTo($permissions);
    }
}
