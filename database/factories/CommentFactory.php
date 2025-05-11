<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class commentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' => $this->faker->name(),
            'content' => $this->faker->text(),
            'post_id' => $this->faker->numberBetween(1, 40),
            'user_id' => $this->faker->numberBetween(1, 40),
            'status' => $this->faker->randomElement(['approved','pending']),
            'created_at' => $this->faker->date(),
        ];
    }
}
