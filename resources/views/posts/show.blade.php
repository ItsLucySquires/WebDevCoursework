@extends('layouts.app')

@section('title', 'Posts')

@section('content')
  <p>Posts</p>
  <ul>
      <li>Content: {{ $post->content }}</li>
  </ul>
@endsection
