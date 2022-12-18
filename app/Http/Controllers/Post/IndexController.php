<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;


class IndexController extends BaseController
{

    public function __invoke(FilterRequest $request)
    {

        // Возвращает критерия для валидации
        $data = $request->validated();

        $page = $data['page'] ?? '1';
        $perPage = $data['per_page'] ?? '10';
        // Извлекаем экземляр класса PostFilter из контейнера
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        // Фильтруем коллекцию, используя заданный обратный вызов.
        $posts = Post::filter($filter)->paginate($perPage,['*'],'page',$page);

        return PostResource::collection($posts);

        return view('post.index',compact('posts'));
    }
}
