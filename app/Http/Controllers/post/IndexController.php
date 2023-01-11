<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Post;



class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

}