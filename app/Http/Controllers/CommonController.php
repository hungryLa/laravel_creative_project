<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommonController extends Controller
{
    public function index(){
        return view('index');
    }

    public function auth(){
        return view('auth');
    }

    public function registration(){
        return view('registration');
    }
}

