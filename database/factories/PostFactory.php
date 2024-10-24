<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->paragraphs(3, true),
            'excerpt' => $this->faker->sentence(),
            'user_id' => User::factory(), // Assuming you have a User factory
            // 'category_id' => Category::factory(), 
            'tags' => $this->faker->words(3, true),
            'meta_title' => $this->faker->sentence(),
            'meta_description' => $this->faker->paragraph(),
            'meta_keywords' => $this->faker->words(5, true),
            'published_at' => now(),
            'is_active' => true,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
