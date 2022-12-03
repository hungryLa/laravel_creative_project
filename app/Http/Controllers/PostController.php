<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return view('posts',compact('posts'));
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

    public function firstOrCreate(){

        $anotherPost = [
            'title' => 'Some1 post',
            'content' => 'Some1 content',
            'image' => 'Some url',
            'likes' => 5000,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'Some1 post'
        ], $anotherPost);
        dd($post->content);
    }

    public function updateOrCreate(){
        $updatedPost = [
            'title' => 'Some3 post',
            'content' => 'Some3 content',
            'image' => 'Some3 url',
            'likes' => 3000,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate([
            'title' => 'Some3 post',
        ], $updatedPost);

        dd($post->content);
    }
}
