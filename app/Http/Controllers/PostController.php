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

    public function update($id){
        $post = Post::find($id);
        
        $post->update([
            'title' => 'Updated',
            'content' => 'Updated',
            'image' => 'Updated',
            'likes' => 2,
            'is_published' => 1,
        ]);
        dd("Updated");
    }

    public function delete($id){
        $post = Post::find($id);

        $post->delete();

        dd('Success');
    }

    // This method restores the record if the deletion was soft
    public function restore($id)
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
