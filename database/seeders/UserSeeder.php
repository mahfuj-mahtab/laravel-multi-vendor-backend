<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin1@example.com',
            'username' => 'admin1',
            'password' => Hash::make('password'),
            'role' => 'ADMIN'
        ]);

        // Create Vendor Users
        User::create([
            'name' => 'Vendor One',
            'email' => 'vendor11@example.com',
            'username' => 'vendor1',
            'password' => Hash::make('password'),
            'role' => 'VENDOR'
        ]);

        User::create([
            'name' => 'Vendor Two',
            'email' => 'vendor2@example.com',
            'username' => 'vendor2',
            'password' => Hash::make('password'),
            'role' => 'VENDOR'
        ]);

        // Create Customer Users
        User::create([
            'name' => 'Customer One',
            'email' => 'customer1@example.com',
            'username' => 'customer1',
            'password' => Hash::make('password'),
            'role' => 'USER'
        ]);

        User::create([
            'name' => 'Customer Two',
            'email' => 'customer2@example.com',
            'username' => 'customer2',
            'password' => Hash::make('password'),
            'role' => 'USER'
        ]);
    }
}
