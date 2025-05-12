<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['تکنولوژی', 'برنامه نویسی','ویندوز']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'slug' => $this->faker->slug(),
            'created_at' => $this->faker->date(),
        ];
    }
}
