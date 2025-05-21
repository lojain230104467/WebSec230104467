<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['name' => 'add_products', 'guard_name' => 'web'],
            ['name' => 'edit_products', 'guard_name' => 'web'],
            ['name' => 'delete_products', 'guard_name' => 'web'],
            ['name' => 'show_users', 'guard_name' => 'web'],
            ['name' => 'edit_users', 'guard_name' => 'web'],
            ['name' => 'delete_users', 'guard_name' => 'web'],
            ['name' => 'admin_users', 'guard_name' => 'web'],
            ['name' => 'add_review', 'guard_name' => 'web'],
            ['name' => 'manage_sales', 'guard_name' => 'web'],
            ['name' => 'buy_products', 'guard_name' => 'web'],
            ['name' => 'view_purchases', 'guard_name' => 'web'],
            ['name' => 'manage_inventory', 'guard_name' => 'web'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $employeeRole = Role::firstOrCreate(['name' => 'Employee']);
        $customerRole = Role::firstOrCreate(['name' => 'Customer']);

        // Assign permissions to roles
        $adminRole->givePermissionTo([
            'add_products', 'edit_products', 'delete_products',
            'show_users', 'edit_users', 'delete_users', 'admin_users',
            'manage_sales', 'manage_inventory'
        ]);

        $employeeRole->givePermissionTo([
            'add_products', 'edit_products', 'delete_products',
            'show_users', 'manage_sales', 'manage_inventory'
        ]);

        $customerRole->givePermissionTo([
            'buy_products', 'view_purchases', 'add_review'
        ]);
    }
}