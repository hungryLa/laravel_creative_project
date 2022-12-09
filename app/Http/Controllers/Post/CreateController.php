<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Models\Topic;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $topics = Topic::all();
        $tags = Tag::all();
        return view('post.create',compact('topics','tags'));
    }
}
