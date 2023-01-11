<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Post;



class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
