<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // $post = Post::find(1);
        $posts = Post::all(); // поиск всех постов
        // $posts = Post::where('is_published', 0)->first(); // поиск по критериям
        // foreach($posts as $post){
        //     dump($post->title);
        // }

        // dd('end');
        // dd($posts);
        return view('main', compact('posts'));
    }
    
}


