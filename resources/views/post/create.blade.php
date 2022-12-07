@extends('layouts.app')

@section("title")Форма@endsection

@section("content")
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Enter the title">
            @error('title')    
                <p class="text-danger">{{ $message }}</p>
            @enderror
        
        </div>
    </div>
    <div class="mb-3 row">
        <label for="ContentPost" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" name="content" id="ContentPost" placeholder="Enter the content">{{ old('content') }}</textarea>
            @error('content')    
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="imagePost" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="image" id="imagePost" value="{{ old('image') }}" placeholder="Select the image">
            @error('image')    
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="topic_id" class="col-sm-2 col-form-label">Topic</label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example" name="topic_id" id="topic_id">
                <option>Select a topic</option>
                @foreach ($topics as $topic)
                    <option 
                        {{ old('topic_id') == $topic->id ? 'selected' : '' }}
                        value="{{ $topic->id }}">{{ $topic->title }}
                    </option> 
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tags" class="col-sm-2 col-form-label">Tag</label>
        <div class="col-sm-10">
            <select class="form-select" multiple aria-label="multiple select example" id="tags" name="tags[]">
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option> 
            @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection