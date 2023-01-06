<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // поиск всех постов
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {           // автоматизированный метод Laravel
        return view('post.show', compact('post'));
    }
    // public function show($id){
    //     $post = Post::findOrFail($id);          // обработка ошибки
    //     dd($post->title);

    // }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }


    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

    // public function delete()
    // {
    //     $post = Post::withTrashed()->find(4); // ищет с учетом удаленных обьектов
    //     $post->restore();   // восстанавливает обьект 
    //     // $post->delete();
    //     dd('deleted');
    // }

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
