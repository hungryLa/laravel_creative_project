@extends('layouts.app')

@section("title")Посты@endsection

@section("content")
    @foreach ($posts as $post)
        <p>{{ $post->title }} </p>   
    @endforeach
@endsection