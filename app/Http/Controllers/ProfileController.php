<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile=Profile::where('user_id', $id)->first();
        return view('profile.show', ['profile'=>$profile]);
    }

    public function apiShow($id)
    {
        $profile=Profile::where('user_id', $id)->first();
        return view('profile.show', ['profile'=>$profile]);
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
      $validatedData=$request->validate([
        'content'=>'required',
      ]);
      $profile=Profile::findOrFail($id);
      $profile->descritpion=$validatedData['content'];
      $profile->save();
      return view('profiles.show', ['profiles'=>$profile]);
    }

    public function apiUpdate(Request $request, $id)
    {
      $validatedData=$request->validate([
        'content'=>'required',
      ]);
      $profile=Profile::findOrFail($id);
      $profile->descritpion=$request['content'];
      $profile->save();
      return view('profiles.show', ['profiles'=>$profile]);
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
