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

Route::get('/', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts/create/category', 'PostsController@createCategory');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/sort/{category}', 'PostsController@sortReports');

Route::get('/posts/{post}', 'PostsController@show');

Route::post('/post/{post}/comments', 'CommentsController@store');

Route::delete ('/posts/delete', 'CommentsController@delete');

Route::patch ('/posts/update', 'CommentsController@update');

Route::get('/admin-comments', 'CommentsController@comments');

Route::get('/admin-articles', 'CommentsController@articles');

Route::get('/search', 'PostsController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::patch ('/posts/edit', 'PostsController@edit');

// controller
// eloquent model
// migration
