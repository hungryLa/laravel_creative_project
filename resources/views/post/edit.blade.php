@extends('layouts.app')

@section("title")Редактирование@endsection

@section("content")
<form action="{{ route('posts.update',$post->id )}}" method="POST">
    @csrf
    @method('patch')
    <div class="mb-3 row">
        <label for="titlePost" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="title" id="titlePost" placeholder="Enter the title" value="{{ $post->title }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="ContentPost" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" name="content" id="ContentPost" placeholder="Enter the content" >{{ $post->content }}</textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="imagePost" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="image" id="imagePost" placeholder="Select the image" value="{{ $post->image }}">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Edit</button>
</form>

@endsection