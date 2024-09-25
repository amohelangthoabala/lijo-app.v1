<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use App\Models\User;
use App\Models\Restaurant;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Randomly choose between User or Restaurant
        $addressableType = $this->faker->randomElement([User::class, Restaurant::class]);

        return [
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'district' => $this->faker->state,
            'postal_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'addressable_id' => $addressableType::inRandomOrder()->first()->id, // Fetch random User or Restaurant ID
            'addressable_type' => $addressableType, // Set the polymorphic type (User or Restaurant)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
