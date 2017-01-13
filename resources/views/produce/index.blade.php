@extends('layout')

@section('title', 'Produce')

@section('header')
  <link rel="stylesheet" type="text/css" href="css/produce.css">
  <script src="js/produce.js" type="text/javascript" ></script>
@endsection

@section('content')
  <div class="produce-list">
    <ul>
      <li class="active"><p>All</p></li>
      @foreach ($categories as $category)
        <li><p>{{$category->name}}</p></li>
      @endforeach
    </ul>
  </div>
  <div class="all-produce produce">
    @foreach ($posts as $post)
      <div class="post">
        <img src="/storage/{{$post->image}}" />
        <p>{{$post->title}}</p>
      </div>
    @endforeach
  </div>
  @foreach ($categories as $category)
    <div class="{{$category->name}}-produce produce">
      @foreach ($posts as $post)
        @if($post->category_id == $category->id)
          <div class="post">
            <img src="/storage/{{$post->image}}" />
            <p>{{$post->title}}</p>
          </div>
        @endif
      @endforeach
    </div>
  @endforeach
@endsection
