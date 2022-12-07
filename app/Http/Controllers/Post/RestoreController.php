<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class RestoreController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::withTrashed()->find($id);

        if($post->restore()){
            dd("Success");
        }
        else{
            dd("Something wrong");
        }  
    }
}
