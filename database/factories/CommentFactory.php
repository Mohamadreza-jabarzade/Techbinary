<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class CommentFactory extends Factory
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
            'post_id' => $this->faker->numberBetween(1, 40), // فرض کن 40 پست داریم
            'user_id' => $this->faker->numberBetween(1, 40), // فرض کن 40 کاربر داریم
            'status' => $this->faker->randomElement(['approved', 'pending']),
            'created_at' => Carbon::now()->subDays(rand(1, 90)), // تاریخ تصادفی بین 1 تا 90 روز پیش
        ];
    }
}
