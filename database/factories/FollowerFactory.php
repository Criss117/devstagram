<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follower>
 */
class FollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user_id = [];
        for ($i = 0; $i < 10; $i++) {
            $user_id[] = $i + 1;
        }

        return [
            'user_id' => fake()->randomElement($user_id),
            'follower_id' => fake()->randomElement($user_id),
        ];
    }
}
