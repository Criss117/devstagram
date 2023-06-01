<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $id = [];
        for ($i = 0; $i < 20; $i++) {
            $id[] = $i + 1;
        }

        return [
            'titulo' => fake()->sentence(5),
            'descripcion' => fake()->sentence(20),
            'imagen' => 'c4e26ad1-796b-4b22-8b75-19b7aca9703c.png',
            'user_id' => fake()->randomElement($id)
        ];
    }
}
