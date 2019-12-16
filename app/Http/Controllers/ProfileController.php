<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;

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
        $profile=Profile::findOrFail($id);
        return view('profiles.show', ['profile'=>$profile]);
    }

    public function apiShow($id)
    {
        $profile=Profile::findOrFail($id);
        return view('profiles.show', ['profile'=>$profile]);
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
        $profile=Profile::where('user_id', $id)->first();
        $profile->descritpion=$validatedData['content'];
        $profile->save();
        return view('profiles.show', ['profiles'=>$profile]);
    }

    public function apiUpdate(Request $request, $id)
    {
      $validatedData=$request->validate([
        'description'=>'required',
      ]);
      $profile=Profile::where('user_id', $id)->first();
      $profile->description=$validatedData['description'];
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
