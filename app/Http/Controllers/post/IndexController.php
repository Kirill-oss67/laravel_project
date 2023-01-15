<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\post\BaseController;
use App\Http\Filters\PostFilter;
use App\Models\Post;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request) // однометодный контроллер 
    {

        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(50);   // пагинация
        return PostResource::collection($posts);







        // dd($posts);

        // $query = Post::query();
        // if (isset($data['category_id'])) {
        //     $query->where('category_id', $data['category_id']);
        // }
        // if (isset($data['title'])) {
        //     $query->where('title', 'like', "%{$data['title']}%");        // пример работы фильтров(не очень хороший вариант)
        // }
        // if (isset($data['content'])) {
        //     $query->where('content', 'like', "%{$data['content']}%");
        // }
        // $posts = $query->get();
        // dd($posts);
        // $posts = Post::where('is_published', 1)->where('category_id', 4)->get();
        // dd($posts);
        // $posts = Post::all();
        // $posts = Post::paginate(10); // such a cool pagination here
        // return view('post.index', compact('posts'));   // раскомитить для получения 'нормальной' html странички от вью
    }
}
