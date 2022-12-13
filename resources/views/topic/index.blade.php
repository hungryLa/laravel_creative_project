@extends('layouts.mainsite')

@section("title")
    Темы
@endsection

@section("content")
    <p><a href="{{ route('topics.create') }}" class="btn btn-primary">Add one</a></p>
    @if (!empty($topics))
        @foreach ($topics as $topic)
            <p>{{ $topic->id }}. <a href="{{ route('topics.show', $topic->id) }}">{{ $topic->title }}</a></p>
        @endforeach
    @endif

@endsection
