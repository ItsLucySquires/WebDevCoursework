@extends('layouts.app')

@section('title', 'Posts')

@section('content')
  <p>Posts</p>
  <ul>
    @foreach ($posts as $post)
      <li><a href="{{ route('posts.show', ['id'=>$post->id] )}}">{{ $post->content }}</a></li>
    @endforeach
  </ul>
  <form method="POST" action="{{route('posts.store') }}">
    @csrf
    <p>Contents: <input type="text" name="content"></p>
    <input type="submit" value="Submit">
  </form
@endsection
