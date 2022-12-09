<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'likes' => random_int(1, 2000),
            'is_published' => 1,
            'topic_id' => Topic::get()->random()->id,
        ];
    }
}
