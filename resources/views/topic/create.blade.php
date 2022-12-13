@extends('layouts.mainsite')

@section("title")
    Форма
@endsection

@section("content")
    <form action="{{ route('topics.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="titleTopics" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="titleTopics" placeholder="Enter the title">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>

@endsection
