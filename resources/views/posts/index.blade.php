@extends('layouts.app')

@section('title', 'Posts')

@section('content')
  <p>All posts:</p>
  <ul>
    @foreach ($post as $post)
        <li><a href="{{route('posts.show', ['id=>$post=>id']) }}">{{$post->content}}</a></li>
    @endforeach
  </ul>

  <a href="{{route('posts.create')}}">Make new post</a>
@endsection
