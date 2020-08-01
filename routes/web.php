<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PostController@index')->name('posts');
Route::get('/posts/create', 'PostController@showCreateForm')->name('posts.create');
Route::post('/posts/create', 'PostController@create');
Auth::routes();
Route::get('/posts/{id}/show', 'PostController@show')->name('posts.show');
Route::get('/posts/{id}/edit', 'PostController@showedit')->name('posts.edit');
Route::post('/posts/{id}/edit', 'PostController@edit');
Route::post('/posts/{id}/delete', 'PostController@delete')->name('posts.delete');