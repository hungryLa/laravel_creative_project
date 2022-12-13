@extends('layouts.mainsite')

@section("title")
    Тема {{ $topic->title }}
@endsection

@section("content")
    <div>
        <p>{{ $topic->id }}. {{ $topic->title }} </p>
    </div>
    <div>
        <form action="{{ route('topics.delete',$topic->id) }}" method="POST">
            @csrf
            @method('delete')
            <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-warning">Edit</a>
            <button class="btn btn-danger"> Delete</button>
            <a href="{{ route('topics.index') }}" class="btn btn-primary">Back</a>
        </form>

    </div>
@endsection
