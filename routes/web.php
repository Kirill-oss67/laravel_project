<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ('welcome');
});

Route::get(
    '/my_page',
    'MyPlaceController@index'
);

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('posts/update', 'PostController@update');
Route::get('posts/delete','PostController@delete'); 
