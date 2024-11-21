<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RestaurantSeeder::class,
            AddressSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,

           // PaymentSeeder::class,
            //DeliverySeeder::class,
            // TagSeeder::class,
        ]);


    }
}
