<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', 'PostController@index')->name('posts.index');

Route::get('posts/create', 'PostController@create')->name('posts.create');

Route::post('posts', 'PostController@store')->name('posts.store');

Route::get('posts/{id}', 'PostController@show')->name('posts.show');
