<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;


class IndexController extends BaseController
{

    public function __invoke(FilterRequest $request)
    {
        // Возвращает критерия для валидации
        $data = $request->validated();
        // Извлекаем экземляр класса PostFilter из контейнера
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        // Фильтруем коллекцию, используя заданный обратный вызов.
        $posts = Post::filter($filter)->paginate(10);

        return view('post.index',compact('posts'));
    }
}
