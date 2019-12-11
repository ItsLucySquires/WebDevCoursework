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

//Route::get('posts/{id}', 'CommentController@apiIndex')->name('api.comments.index');

Route::get('posts', 'PostController@apiIndex')->name('api.posts.index');

Route::get('posts', 'PostController@apiShow')->name('api.posts.show');

Route::post('posts', 'PostController@apiStore')->name('api.posts.store');
