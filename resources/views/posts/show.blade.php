<?php

@extends('layouts.app')

@section('title', 'Post details')

@section('content')
  <ul>
    <li>Name: {{$post -> forum_user -> name}}</li>
    <li>Date: </li>
    <li>Content: {{$post -> content}}</li>
  </ul>
@endsection
