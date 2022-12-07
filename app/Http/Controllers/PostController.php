<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Tag;
use App\Models\PostTag;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('post.index',compact('posts'));
    }

    public function create(){
        $topics = Topic::all();
        $tags = Tag::all();
        return view('post.create',compact('topics','tags'));
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'topic_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
   
        $post = Post::create($data);

        $post->tags()->attach($tags);
        
        return redirect()->route('posts.index');
    }
    // Method to show of post
    public function show(Post $post){
        return view('post.show',compact('post'));
    }

    public function edit(Post $post){
        $topics = Topic::all();
        $tags = Tag::all();
        return view('post.edit', compact('post','topics','tags'));
    }
    public function update(Post $post){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'topic_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);

        $post->tags()->sync($tags);
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
