<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BadgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'code' => fake()->unique()->slug(),
            'description' => fake()->sentence(),
            'icon' => fake()->imageUrl(50, 50, 'icons'),
            'condition_type' => fake()->randomElement(['page_visit', 'click_count', 'time_spent']),
            'condition_data' => json_encode([
                'target' => fake()->slug(),
                'count' => fake()->numberBetween(1, 100),
            ]),
        ];
    }
}
