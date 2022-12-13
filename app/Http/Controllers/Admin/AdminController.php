<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class AdminController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);
        return view('admin.index',compact('posts'));
    }
}
