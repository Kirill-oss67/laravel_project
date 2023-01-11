<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;

class BaseController extends Controller
{
    public $service;
    public function __constract(Service $service)
    {
        $this->service = $service;
    }
}
