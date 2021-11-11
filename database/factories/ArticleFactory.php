<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            "user_id" => $this->faker->numberBetween(1, 10),
            "category_id" => $this->faker->numberBetween(1, 10),
            "slug" =>  $this->faker->shuffle("belajar-pemrograman"),
            "title" => $this->faker->sentence(),
            "content" => $this->faker->paragraph(50),
            "published" => $this->faker->boolean(),
            "image_url" => "https://images.unsplash.com/photo-1567563549378-81212b9631e4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=667&q=80",
        ];
    }
}
