<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;



class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated(); // вот она валидация)) 

        
        $this->service->store($data);


        return redirect()->route('post.index');
    }
}
