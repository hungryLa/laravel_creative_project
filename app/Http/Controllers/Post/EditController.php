<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        $topics = Topic::all();
        $tags = Tag::all();
        return view('post.edit', compact('post','topics','tags'));
    }
}
