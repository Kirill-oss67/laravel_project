<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
        return view('post.index', compact('posts'));
    }
    public function create()
    {
        $postsArr = [
            [
                'title' => 'spring ',
                'content' => 'dump and warm ',
                'image' => 'image ',
                'likes' => 50,
                'is_published' => 1,


            ],
            [
                'title' => 'spring1 ',
                'content' => 'dump and warm1 ',
                'image' => 'image1 ',
                'likes' => 70,
                'is_published' => 1,


            ],
        ];
        foreach ($postsArr as $item) {
            Post::create($item);
        }
        dd('created');
    }
    public function update()
    {
        $post = Post::find(6);
        $post->update([
            'title' => 'updated ',
            'content' => 'dump and warm1 ',
            'image' => 'image1 ',
            'likes' => 70,
            'is_published' => 1,


        ]);
        dd('updated');
    }
    public function delete()
    {
        $post = Post::withTrashed()->find(4); // ищет с учетом удаленных обьектов
        $post->restore();   // восстанавливает обьект 
        // $post->delete();
        dd('deleted');
    }

    public function first_or_create()
    {
        $another_post = [
            'title' => 'summer ',
            'content' => 'sun ',
            'image' => 'image1 ',
            'likes' => 700,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'summer'
        ], $another_post);
        dump($post->content);
        dd('the and');
    }
    public function update_or_create()
    {
        $another_post = [
            'title' => 'autumn ',
            'content' => 'a lot of leaves ',
            'image' => 'image1 ',
            'likes' => 1000,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate([
            'title' => 'autumn'
        ], $another_post);
        dump($post->content);
        dd('the and');
    }
}


