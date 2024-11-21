<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin' => Role::firstOrCreate(['name' => 'Admin']),
            'Customer' => Role::firstOrCreate(['name' => 'Customer']),
            'Driver' => Role::firstOrCreate(['name' => 'Driver']),
            'Restaurant' => Role::firstOrCreate(['name' => 'Restaurant']),
        ];

        // Create the default admin user
        $admin = User::updateOrCreate(
            ['email' => 'admin@lijo.co.ls'],
            [
                'name' => 'Admin User',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(10),
            ]
        );
        $admin->assignRole($roles['Admin']);

        // Create a specific customer user
        $customer = User::updateOrCreate(
            ['email' => 'customer@lijo.co.ls'],
            [
                'name' => 'Customer User',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );
        $customer->assignRole($roles['Customer']);

        // Create a specific driver user
        $driver = User::updateOrCreate(
            ['email' => 'driver@lijo.co.ls'],
            [
                'name' => 'Driver User',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );
        $driver->assignRole($roles['Driver']);

        // Create specific restaurant users
        for ($i = 1; $i <= 7; $i++) {
            $restaurant = User::updateOrCreate(
                ['email' => "restaurant{$i}@lijo.co.ls"],
                [
                    'name' => "Restaurant {$i}",
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                ]
            );
            $restaurant->assignRole($roles['Restaurant']);
        }
    }
}
