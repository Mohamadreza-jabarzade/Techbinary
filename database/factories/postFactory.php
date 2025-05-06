<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = \Faker\Factory::create('fa_IR');

        return [
            'title' => $faker->realText(30), // مثلاً: "معرفی Tailwind CSS"
            'body' => $faker->realText(300), // متن طولانی‌تر برای بدنه
            'writer' => $faker->name(), // مثل: "زهرا محمدی"
            'date' => $faker->numberBetween(1, 10) . ' روز پیش', // مثل: "۳ روز پیش"
            'category' => $faker->randomElement(['فرانت‌اند', 'بک‌اند', 'دیتابیس', 'DevOps']), // دسته‌بندی‌های رایج
            'read' => 'خواندن ' . $faker->numberBetween(1, 10) . ' دقیقه', // مثل: "خواندن ۳ دقیقه"
            'image' => 'https://placehold.co/600x500?text=' . $faker->word() . '&random=' . $faker->unique()->numberBetween(1, 10000),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'view' => $this->faker->numberBetween(100, 999),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];

    }
}
