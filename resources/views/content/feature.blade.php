@extends('layout')

@section('title', 'Feature')

@section('header')
  <script src="js/jssor.slider-22.1.6.min.js" type="text/javascript"></script>
  <script src="js/content.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="css/content.css">
@endsection

@section('content')

  <!-- sub menu -->
  <div class="content-menu">
    <ul>
      <li class="feature-button active"><a href="/feature">บทความพิเศษ</a></li>
      <li class="pr-button"><a href="/pr">บทความ PR</a></li>
      <li class="review-button"><a href="/review">รีวิว</a></li>
    </ul>
  </div>

  <div class="content-page">
    <div class="slider-feature">
      <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:800px;height:460px;overflow:hidden;visibility:hidden;">
          <!-- Loading Screen -->
          <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
              <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
              <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
          </div>
          <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:800px;height:400px;overflow:hidden;">
            @foreach ($posts as $post)
              <div>
                <a href="/post/{{$post->id}}" target="_blank"><img data-u="image" src="/storage/{{$post->image}}" /></a>
                <div data-u="caption" class="caption" data-t="1">
                  <div class="right-detail">
                    <a href="/post/{{$post->id}}" target="_blank" style="color:white;"><h2><b>{{$post->title}}</b></h2></a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <!-- Bullet Navigator -->
          <div data-u="navigator" class="jssorb01" style="bottom:16px;right:168px;">
              <div data-u="prototype" style="width:12px;height:12px;"></div>
          </div>
          <!-- Arrow Navigator -->
          <span data-u="arrowleft" class="jssora02l" style="bottom: 0px;right:68px;width:55px;height:55px;"></span>
          <span data-u="arrowright" class="jssora02r" style="bottom: 0px;right:8px;width:55px;height:55px;"></span>
        </div>
      <script type="text/javascript">jssor_1_slider_init();</script>
      <!-- #endregion Jssor Slider End -->
    </div>

    <div class="banner">
      <img src="/img/content_banner.jpg" >
    </div>

    <div class="bar">
      <div class="selected-type sub-bar"><p><b>All news</b></p></div>
      <div class="sitemenu-title sub-bar"><p><b>Site Menu</b></p></div>
    </div>

    <div class="below-bar">
      <!-- left side content -->
      <div class="contents">
        <div class="type-choice">
          <ul>
            <li class="all-type">All</li>
            @foreach ($categories as $category)
              /
              <li class="{{$category->name}}-type">{{$category->name}}</li>
            @endforeach
          </ul>
        </div>
        <div class="contents-list">
          <div class="all-content lists">
            @foreach ($posts as $post)
              <div class="list">
                <a href="/post/{{$post->id}}" target="_blank" ><img src="storage/{{$post->image}}" /></a>
                <div class="detail">
                  <a href="/post/{{$post->id}}" target="_blank" ><h2><b>{{$post->title}}</b></h2></a>
                  <p>{{$post->excerpt}} <a href="/post/{{$post->id}}" target="_blank" >คลิกเพื่ออ่านต่อ...</a></p>
                </div>
              </div>
            @endforeach
          </div>
          @foreach ($categories as $category)
            <div class="{{$category->name}}-content lists">
              @foreach ($posts as $post)
                @if ($post->category_id == $category->id)
                  <div class="list">
                    <a href="/post/{{$post->id}}" target="_blank" ><img src="storage/{{$post->image}}" /></a>
                    <div class="detail">
                      <a href="/post/{{$post->id}}" target="_blank" ><h2><b>{{$post->title}}</b></h2></a>
                      <p>{{$post->excerpt}} <a href="/post/{{$post->id}}" target="_blank" >คลิกเพื่ออ่านต่อ...</a></p>
                    </div>
                  </div>
                @endif
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <!-- right side menu -->
      <div class="sitemenu">

      </div>
    </div>

  </div>

@endsection
