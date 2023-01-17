<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;



class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {


        $data = $request->validated(); // вот она валидация)) 


        $post = $this->service->store($data);
        // if ($post instanceof Post) {
        //     return new PostResource($post);
        // }
        return $post instanceof Post ? new PostResource($post): $post; // тернарный оператор
        



        // return redirect()->route('post.index');         // раскомитить для получения 'нормальной' html странички от вью
    }
}
