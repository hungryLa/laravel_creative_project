<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(20)->create();
        $topics = Topic::factory(30)->create();
        $posts = Post::factory(40)->create();

        foreach ($posts as $post){
            $tagsId = $tags->random(3)->pluck('id');
            $post->tags()->attach($tagsId);
        }
    }
}
