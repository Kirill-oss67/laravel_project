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
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="Content"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="Image">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category_id" id="category">
                @foreach($categories as $category){
                <option value="{{  $category->id }}">{{ $category->title }}</option>
                }
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Select tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
            @foreach($tags as $tag){
                <option value="{{  $tag->id }}">{{ $tag->title }}</option>
                }
                @endforeach
            </select>
        </div>




        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection