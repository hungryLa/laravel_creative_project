<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(FilterRequest $request){
        // Возвращает критерия для валидации
        $data = $request->validated();
        // Извлекаем экземляр класса PostFilter из контейнера
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        // Фильтруем коллекцию, используя заданный обратный вызов.
        $posts = Post::filter($filter)->paginate(10);

        return view('admin.post.index', compact('posts'));
    }
}
