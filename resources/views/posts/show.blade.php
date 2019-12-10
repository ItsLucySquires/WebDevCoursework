@extends('layouts.app')

@section('title', 'Post details')

@section('content')
  <ul>
    <li>Name: {{$post -> user_id}}</li>
    <li>Date: </li>
    <li>Content: {{$post -> content}}</li>
  </ul>
  <p>
  <ul>
    @foreach ($comments as $comment)
        <li>{{$comment->content}}</li>
    @endforeach
  </ul>
@endsection
