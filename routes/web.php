<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', 'PostController@index')->name('posts.index')->middleware('auth');

Route::get('posts/{id}', 'PostController@show')->name('posts.show')->middleware('auth');;

Route::get('posts/create', 'PostController@create')->name('posts.create')->middleware('auth');

Route::post('posts', 'PostController@store')->name('posts.store')->middleware('auth');

Route::post('posts/{id}', 'CommentController@store')->name('comments.store')->middleware('auth');;

Route::delete('posts', 'PostController@destroy')->name('posts.destroy')->middleware('auth');;

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index');
