<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::put('profiles/{id}', 'ProfileController@apiUpdate')->name('api.profiles.update');

Route::get('profiles/{id}', 'ProfileController@apiShow')->name('api.profiles.show');

Route::get('posts', 'PostController@apiIndex')->name('api.posts.index')->middleware('auth');

Route::get('posts/create', 'PostController@apiCreate')->name('api.posts.create');

Route::get('posts/{id}', 'PostController@apiShow')->name('api.posts.show');

Route::post('posts/{id}', 'CommentController@apiStore')->name('api.comments.store');

Route::post('posts', 'PostController@apiStore')->name('api.posts.store');
