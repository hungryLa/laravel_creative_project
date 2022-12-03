<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index(){
        $topics = Topic::all();
        return view('topic.index',compact('topics'));
    }

    public function create(){
        return view('topic.create');
    }
    public function store(){
        $data = request()->validate([
            'title' => 'string',
        ]);
        Topic::create($data);

        return redirect()->route('topics.index');
    }

    public function show($id){
        $topic = Topic::find($id);
        return view('topic.show',compact('topic'));
    }

    public function edit($id){
        $topic = Topic::find($id);
        return view('topic.edit', compact('topic'));
    }

    public function update($id){
        $topic = Topic::find($id);
        $data = request()->validate([
            'title' => 'string', 
        ]);
        $topic->update($data);
        return redirect()->route('topics.show', $topic->id);
    }

    public function delete($id){
        $topic = Topic::find($id);
        $topic->delete();
        return redirect()->route('topics.index');
    }
}
