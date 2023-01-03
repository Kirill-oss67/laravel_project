<?php

use App\Http\Controllers\PostController;
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

Route::get('/posts', 'PostController@index')->name('post.index');  // указываем имя роута 
Route::get('/posts/create', 'PostController@create');
Route::get('posts/update', 'PostController@update');
Route::get('posts/delete','PostController@delete'); 
Route::get('posts/first_or_create', 'PostController@first_or_create');
Route::get('posts/update_or_create', 'PostController@update_or_create');

Route::get('/main', 'MainController@index')->name('main.index');
Route::get('/contacts', 'ContactController@index')->name('contact.index');
Route::get('/users', 'UserController@index')->name('user.index');