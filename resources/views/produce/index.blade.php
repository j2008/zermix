@extends('layout')

@section('title', 'Produce')

@section('header')
  <link rel="stylesheet" type="text/css" href="css/produce.css">
  <script src="js/produce.js" type="text/javascript" ></script>

  <!-- Add fancyBox -->
	<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
@endsection

@section('content')
  <!-- produce type list menu -->
  <div class="produce-list">
    <ul>
      <li class="all-button active"><p>ทั้งหมด</p></li>
      @foreach ($categories as $category)
        <li class="{{$category->name}}-button"><p>{{$category->name_th}}</p></li>
      @endforeach
    </ul>
  </div>

  <!-- produce list -->
  <div class="all-produce produce">
    @foreach ($posts as $post)
      <div class="post" onclick="loadDetail({{$post->id}});">
        <img src="/storage/{{$post->image}}" />
        <p>{{$post->title}}</p>
      </div>
    @endforeach
  </div>
  @foreach ($categories as $category)
    <div class="{{$category->name}}-produce produce">
      @foreach ($posts as $post)
        @if($post->category_id == $category->id)
          <div class="post" onclick="loadDetail({{$post->id}});">
            <img src="/storage/{{$post->image}}" />
            <p>{{$post->title}}</p>
          </div>
        @endif
      @endforeach
    </div>
  @endforeach

  <!-- produce detail -->
  <div class="produce-detail">

  </div>

@endsection
