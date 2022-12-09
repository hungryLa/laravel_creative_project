<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Models\Post;


class RestoreController extends BaseController
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
