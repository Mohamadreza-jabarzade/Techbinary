<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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

        $faker = \Faker\Factory::create('fa_IR');

        return [
            'title' => $faker->realText(60), // مثلاً: "معرفی Tailwind CSS"
            'body' => $faker->realText(300), // متن طولانی‌تر برای بدنه
            'writer' => $faker->name(), // مثل: "زهرا محمدی"
            'category_id' => $faker->numberBetween(1, 3), // فرض بر این است که ۳ دسته داریم
            'image' => 'posts/Y78UM6rbBR1t0Z7rvAfyDHm89ICxImZGatXBd1um.png',
            'status' => $this->faker->randomElement(['draft', 'published']),
            'view' => $this->faker->numberBetween(100, 999),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];

    }
}
