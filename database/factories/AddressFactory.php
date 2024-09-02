<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'street' => $this->faker->streetAddress,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'is_user' => $this->faker->boolean(50),
            'city' => $this->faker->city,
            'district' => $this->faker->state,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
