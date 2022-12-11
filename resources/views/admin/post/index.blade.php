@extends('layouts.admin')

@section('content')
    <div>
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add one</a>
        </div>

        @foreach ($posts as $post)
            <p>{{ $post->id }}. <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></p>
        @endforeach

        <div>
            {{$posts->withQueryString()->links()}}
        </div>
    </div>
@endsection
