<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'title'=> $this->faker->sentence(4, true),
            'cover'=> "capa_posts/capa_default.jpg",
            'content'=> $this->faker->paragraph(5, false),
            'status'=> $this->faker->boolean(12),
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now')
        ];
    }
}
