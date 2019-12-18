<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', 'PostController@index')
    ->name('posts.index')->middleware('auth');

Route::get('posts/create', 'PostController@create')
    ->name('posts.create')->middleware('auth');

Route::post('posts', 'PostController@store')
    ->name('posts.store')->middleware('auth');

Route::post('posts/{id}', 'CommentController@store')
    ->name('comments.store')->middleware('auth');

Route::get('posts/{id}', 'PostController@show')
    ->name('posts.show')->middleware('auth');

Route::get('posts/edit/{id}', 'PostController@edit')
    ->name('posts.edit')->middleware('auth');

Route::post('posts/edit/{id}', 'PostController@myEdit')
->name('posts.myedit')->middleware('auth');

Route::get('comments/edit/{id}', 'CommentController@edit')
    ->name('comments.edit')->middleware('auth');

Route::post('comments/edit/{id}', 'CommentController@myEdit')
    ->name('comments.myedit')->middleware('auth');

Route::get('post/delete/{id}', 'PostController@destroy')
    ->name('posts.delete')->middleware('auth');

Route::get('comments/delete/{id}', 'CommentController@destroy')
    ->name('comments.delete')->middleware('auth');


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index');
