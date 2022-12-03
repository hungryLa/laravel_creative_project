@extends('layouts.app')

@section("title")Форма@endsection

@section("content")
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div class="mb-3 row">
        <label for="titlePost" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="title" id="titlePost" placeholder="Enter the title">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="ContentPost" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" name="content" id="ContentPost" placeholder="Enter the content"></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="imagePost" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="image" id="imagePost" placeholder="Select the image">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection