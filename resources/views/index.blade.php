@extends('layout')

@section('title', 'Home')

@section('content')
  @foreach ($posts as $post)
    {{ $post->body }}
  @endforeach
@endsection
