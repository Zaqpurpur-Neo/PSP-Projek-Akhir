<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arr_image = ["1.png", "2.webp", "3.png", "4.png", "5.jpg", "6.png", "7.png", "8.jpg", "9.jpg", "10.jpg", "11.jpg", "12.png", "13.png", "14.jpg", "15.png", "16.jpg", "17.jpg", "18.jpg", "19.png"];
        $arr_key = mt_rand(0, 18);
        return [
            "judul" => $this->faker->sentence(),
            "content" => collect($this->faker->paragraph(mt_rand(50, 80)))->map(function($p) {
                return "<p>{$p}</p>";
            })->implode(''),
            "slug" => $this->faker->slug(),
            "user_id" => mt_rand(1, 2),
            "category_id" => mt_rand(1, 61),
            "image" => 'post-image/image-' . $arr_image[$arr_key]
        ];
    }
}
