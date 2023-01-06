@extends('layouts.main')
@section('content')
<div>
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="post_content">Post_content</label>
            <textarea name="post_content" class="form-control" id="post_content" placeholder="Post_content"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="Image">
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection