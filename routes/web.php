<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', 'PostController@index')->name('posts.index');

Route::get('posts/{id}', 'PostController@show')->name('posts.show');

Route::get('posts/create', 'PostController@create')->name('posts.create')->middleware('auth');

Route::post('posts', 'PostController@store')->name('posts.store')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
