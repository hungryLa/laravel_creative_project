<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::all();
        $topic = Topic::find(1);
        $post = Post::find(1);
        dd($topic->posts);
        dd($post->topic);
        return view('post.index',compact('posts'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('posts.index');
    }
    // Method to show of post
    public function show(Post $post){
        return view('post.show',compact('post'));
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }
    public function update(Post $post){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('posts.show', $post->id);
    }


    public function delete(Post $post){
        $post->delete();

        return redirect()->route('posts.index');
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
