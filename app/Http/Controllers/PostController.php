<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        foreach($posts as $post){
            dump($post->title);
        }
    }

    public function create(){
        $postArr =[
            [
                'title' => 'Name of post',
                'content' => 'Content of post',
                'image' => 'image.jpg',
                'likes' => 10,
                'is_published' => 1,
            ],
            [
                'title' => 'Another name of post',
                'content' => 'Another content of post',
                'image' => 'image1.jpg',
                'likes' => 20,
                'is_published' => 1,
            ]
        ];
        foreach ($postArr as $item){
            Post::create($item);
        }
        
    }
}
