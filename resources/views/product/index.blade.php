@extends('layout')

@section('title', 'Product ผลิตภัณฑ์ทั้งหมด')

@section('header')
  <link rel="stylesheet" type="text/css" href="css/animations.css">
  <link rel="stylesheet" type="text/css" href="css/product.css">
  <script src="js/product.js" type="text/javascript" ></script>

  <!-- Add fancyBox -->
	<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <meta name="description" content="ผลิตภัณฑ์ ZERMIX HELIONOF MICELLAR บำรุงผิวหน้า กันแดด และทำความสะอาด">
@endsection

@section('content')
  <!-- product type list menu -->
  <div class="product-list">
    <ul>
      <li class="all-button active"><p>ทั้งหมด</p></li>
      @foreach ($categories as $category)
        <li class="{{$category->name}}-button"><p>{{$category->name_th}}</p></li>
      @endforeach
    </ul>
  </div>

  <!-- product list -->
  <div class="all-product product">
    @foreach ($posts as $post)
    <a href="/post/{{$post->id}}" target="_blank">
      <div class="post animate" onclick="//loadDetail({{$post->id}});">
        <div>
          <img src="/storage/{{$post->image}}" />
          <p>{{$post->title}}</p>
        </div>
      </div>
    </a>
    @endforeach
  </div>
  @foreach ($categories as $category)
    <div class="{{$category->name}}-product product">
      @foreach ($posts as $post)
        @if($post->category_id == $category->id)
          <a href="/post/{{$post->id}}" target="_blank">
            <div class="post animate" onclick="//loadDetail({{$post->id}});">
              <div>
                <img src="/storage/{{$post->image}}" />
                <p>{{$post->title}}</p>
              </div>
            </div>
          </a>
        @endif
      @endforeach
    </div>
  @endforeach

  <!-- product detail -->
  <div class="product-detail">

  </div>

@endsection
