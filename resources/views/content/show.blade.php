@extends('layout')

@section('title', 'Post')

@section('header')
  <script src="/js/content.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="/css/content.css">
@endsection

@section('content')
  <div class="post-body">
    <h1>{{$post->title}}</h1>
    <div class="content-text">
      <?= $post->body; ?>
    </div>
    <div class="recommend">

    </div>
  </div>
@endsection
