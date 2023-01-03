@extends('layouts.main')
@section('content')
    <div>@foreach($posts as $post)
    <div> {{ $post->id}}.{{$post->title }} </div>
        
    @endforeach
    </div>
@endsection
