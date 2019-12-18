<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\redirect;
use Illuminate\Support\Facades\Gate;
use Auth;

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
      $validatedData=$request->validate([
        'content'=>'required|min:5',
      ]);
      $p=new Post;
      $p->user_id=Auth::id();
      $p->content=$validatedData['content'];
      $p->save();

      //Assigning the tags
      $mcount=Post::all()->count();
      $mpost=Post::find($mcount);
      $rand=range(1, 10);
      shuffle($rand);
      $tagSel=array_slice($rand, 0, 3);
      $mpost->tags()->sync($tagSel);
      return redirect()->route('posts.index');
    }

    public function apiStore(Request $request)
    {
      //Creating the model
      $validatedData=$request->validate([
        'content'=>'required|min:5',
      ]);
      $p=new Post;
      $p->user_id=1;
      $p->content=$validatedData['content'];
      $p->save();
      //Assigning the tags
      $mcount=Post::all()->count();
      $mpost=Post::find($mcount);
      $rand=range(1, 10);
      shuffle($rand);
      $tagSel=array_slice($rand, 0, 3);
      $mpost->tags()->sync($tagSel);
      return redirect()->route('posts.index');
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

    public function edit($id, Request $request)
    {
         $post=Post::findOrFail($id);
         $uid=Auth::id();
         $pid=$post->user_id;
         if (Gate::allows('update-post', $pid, $uid)) {
           return view('posts.edit', ['post'=>$post]);
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
        $post=Post::findOrFail($id);
        $post->content=$validatedData['content'];
        $post->save();
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
          $post=Post::findOrFail($id);
          $uid=Auth::id();
          $pid=$post->user_id;

          if (Gate::allows('update-post', $pid, $uid)){
            $post->delete();
          }
          $posts=Post::all();
          return view('posts.index', ['posts'=>$posts]);
    }
}
