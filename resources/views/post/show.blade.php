@extends('layouts.mainsite')

@section("title")
    Пост {{ $post->title }}
@endsection

@section("content")
    <div>
        <p>{{ $post->id }}. {{ $post->title }} </p>
        <p>{{ $post->content }}</p>
    </div>
    <div>
        <form action="{{ route('posts.delete',$post->id) }}" method="POST">
            @csrf
            @method('delete')
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
            <button class="btn btn-danger"> Delete</button>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
        </form>

    </div>
@endsection
