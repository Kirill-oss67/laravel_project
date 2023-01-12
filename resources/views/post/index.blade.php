@extends('layouts.main')
@section('content')
<div>
    @foreach($posts as $post)
    <div> {{ $post->id}}. {{$post->title }} </div>
    @endforeach
    <div>
        {{ $posts->links() }} // указываем пагинацию
    </div>
</div>
@endsection