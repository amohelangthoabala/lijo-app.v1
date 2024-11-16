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
            'admin' => Role::firstOrCreate(['name' => 'admin']),
            'customer' => Role::firstOrCreate(['name' => 'customer']),
            'driver' => Role::firstOrCreate(['name' => 'driver']),
            'restaurant' => Role::firstOrCreate(['name' => 'restaurant']),
        ];

         // Create the default admin user
         $admin = User::updateOrCreate(
            ['email' => 'admin@lijo.co.ls'],
            [
                'name' => 'Admin User',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        $admin->assignRole($roles['admin']);

        // Create a specific customer user
        $customer = User::updateOrCreate(
            ['email' => 'customer@lijo.co.ls'],
            [
                'name' => 'Customer User',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        );
        $customer->assignRole($roles['customer']);


        // Create a specific driver user
        $driver = User::updateOrCreate(
            ['email' => 'driver@lijo.co.ls'],
            [
                'name' => 'Driver User',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        );
        $driver->assignRole($roles['driver']);

        // Create 7 specific restaurant users
        for ($i = 1; $i <= 7; $i++) {
            $restaurant = User::updateOrCreate(
                ['email' => "restaurant{$i}@lijo.co.ls"],
                [
                    'name' => "Restaurant {$i}",
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                ]
            );
            $restaurant->assignRole($roles['restaurant']);
        }

        // User::factory()->count(10)->create();
    }
}
