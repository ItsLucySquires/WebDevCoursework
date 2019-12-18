<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
      $validatedData=$request->validate([
        'content'=>'required|min:3',
      ]);
      $p=new Comment;
      $p->user_id=Auth::id();
      $p->post_id=$id;
      $p->content=$validatedData['content'];
      $p->save();
      return view('comments.show', ['comments'=>$comments]);
    }

    public function apiStore($id, Request $request)
    {
      //$validatedData=$request->validate([
        //'content'=>'required|min:3',
      //]);
      $p=new Comment;
      $p->user_id=Sentry::getUser()->id;
      $p->post_id=$id;
      $p->content=$request['content'];
      $p->save();
      return view('comments.show', ['comments'=>$comments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $comments=Comment::where('post_id', $id)->get();
         return $comments;
    }


   public function apiShow($id)
   {
        $comments=Comment::where('post_id', $id)->get();
        return $comments;
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment=Comment::findOrFail($id);
        $uid=Auth::id();
        $pid=$comment->user_id;
        if (Gate::allows('update-post', $pid, $uid)) {
             return view('comments.edit', ['comment'=>$comment]);
        }else{
          $posts=Post::all();
          return view('posts.index', ['posts'=>$posts]);
        }
    }

    public function myEdit(Request $request, $id)
    {
        $validatedData=$request->validate([
          'content'=>'required|min:5',
        ]);
        $comment=Comment::findOrFail($id);
        $comment->content=$validatedData['content'];
        $comment->save();
        return view('posts.index');
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
      $post=Comment::findOrFail($id);
      $uid=Auth::id();
      $pid=$post->user_id;
      if (Gate::allows('update-post', $pid, $uid)){
        $post->delete();
      }
      $posts=Post::all();
      return view('posts.index', ['posts'=>$posts]);
    }
}
