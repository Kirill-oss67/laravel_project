<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {   
        // $post = Post::find(1);
        // $posts = Post::all();
        $posts = Post::where('is_published', 0)->first();
        // foreach($posts as $post){
        //     dump($post->title);
        // }
            dump($posts->title);
        // dd('end');
        // dd($posts);
    }
}
