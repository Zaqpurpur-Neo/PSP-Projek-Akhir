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
        return [
            "judul" => $this->faker->sentence(),
            "content" => collect($this->faker->paragraph(mt_rand(5, 10)))->map(function($p) {
                return "<p>{$p}</p>";
            })->implode(''),
            "slug" => $this->faker->slug(),
            "user_id" => mt_rand(1, 2),
            "category_id" => mt_rand(1, 3),
            "image" => 'post-image/image' . mt_rand(1, 3) . '.png'
        ];
    }
}
