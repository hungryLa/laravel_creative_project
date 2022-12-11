@extends('layouts.app')

@section("title")Посты@endsection

@section("content")
    <p><a href="{{ route('posts.create') }}" class="btn btn-primary" >Add one</a></p>
    @foreach ($posts as $post)
        <p>{{ $post->id }}. <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></p>
    @endforeach
    {{$posts->withQueryString()->links()}}
@endsection
