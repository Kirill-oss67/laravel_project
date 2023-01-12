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

Route::group(['namespace' => 'Post'], function () {
    Route::get('/posts', 'IndexController')->name('post.index');  // указываем имя роута 
    Route::get('/posts/create', 'CreateController')->name('post.create');

    Route::post('/posts/create', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', 'IndexController')->name('admin.post.index');
        });
});
// Route::get('/admin', 'AdminController')->name('main.index');
Route::get('/main', 'MainController@index')->name('main.index');
Route::get('/contacts', 'ContactController@index')->name('contact.index');
Route::get('/users', 'UserController@index')->name('user.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
