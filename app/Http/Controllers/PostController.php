<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index', ['posts'=>$posts]);
    }

    public function apiIndex()
    {
        $posts=Post::all();
        return view('posts.index', ['posts'=>$posts]);
        /**$posts=Post::all();
        $stuffToReturn=$posts->comments()->with('user')->get();
        return $stuffToReturn;*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        console.log("Hello");
        $p=new Post;
        $p->user_id=Sentry::getUser()->id;
        $p->content=$validatedData['content'];
        $p->save();
        return view('posts.index', ['posts'=>$posts]);
    }

    public function apiStore(Request $request)
    {
        $p=new Post;
        $p->user_id=1;
        $p->content=$request['content'];
        $p->save();
        return view('posts.index', ['posts'=>$posts]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);
        return view('posts.show', ['post'=>$post]);
    }

    public function apiShow($id)
    {
       $post=Post::findOrFail($id);
       return view('posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
