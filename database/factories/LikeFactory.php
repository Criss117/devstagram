<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = [];
        for ($i = 0; $i < 20; $i++) {
            $user_id[] = $i + 1;
        }
        $post_id = [];
        for ($i = 0; $i < 200; $i++) {
            $post_id[] = $i + 1;
        }
        return [
            'user_id' => fake()->randomElement($user_id),
            'post_id' => fake()->randomElement($post_id),
        ];
    }
}
