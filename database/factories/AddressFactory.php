<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'street'=> $this->faker->name(),
            'user_id'=> User::all()->random()->id,
            'number'=> $this->faker->numerify(),
            'city'=> $this->faker->city()
        ];
    }
}
