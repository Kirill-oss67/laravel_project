@extends('layouts.main')
@section('content')
<div>
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="post_content">Post_content</label>
            <textarea name="post_content" class="form-control" id="post_content" placeholder="Post_content" >{{ $post->post_content }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="Image" value="{{ $post->image }}" >
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection