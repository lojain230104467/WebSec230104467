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
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(ProductSeeder::class);

        // Create a test admin user
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole('Admin');

        // Create a test customer user
        $customer = User::factory()->create([
            'name' => 'Test Customer',
            'email' => 'customer@example.com',
        ]);
        $customer->assignRole('Customer');
    }
}
