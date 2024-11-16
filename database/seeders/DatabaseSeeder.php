<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
            // MenuSeeder::class,
           // OrderSeeder::class,
           // PaymentSeeder::class,
            //DeliverySeeder::class,
            // TagSeeder::class,
        ]);


    }
}
