@extends('layout')

@section('title')
  {{$post->title}}
@endsection

@section('header')
  <script src="/js/content.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="/css/content.css">
  <link rel="stylesheet" href="/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/owl.theme.default.min.css">
  <script src="/js/owl.carousel.min.js"></script>
  @if(trim($post->meta_description) != "")
    <meta name="description" content="{{$post->meta_description}}">
  @endif
  @if(trim($post->meta_keywords) != "")
    <meta name="keywords" content="{{$post->meta_keywords}}">
  @endif
@endsection

@section('content')
  <div class="post-body">
    <h1>{{$post->title}}</h1>
    <div class="status-bar">
      <li>{{$post->pageview}} view  |  <p class="share_num"></p> share</li>
      <li>{{date_format($post->updated_at, 'l jS F Y')}}</li>
      <li><div id="shareBtn" class="fb-share">Share</div></li>
    </div>
    <div class="content-text">
      <div style="text-align: center;">
        <img class="main_img" src="/storage/<?= $post->image; ?>" />
        @if (isset($ads) && count($ads) > 0)
          <div class="ads">
            <a href="{{$ads->url}}" target="_blank"><img src="{{Voyager::image($ads->image)}}" /></a>
          </div>
        @endif
      </div>
      @if(isset($galleries) && count($galleries) > 0)
        <div style="other-gallery">
          <div class="owl-carousel owl-theme owl-gallery">
            <img src="{{Voyager::image($post->image)}}" onclick="focusImg(this.src)" />
            @foreach ($galleries as $gallery)
              <img src="{{Voyager::image($gallery->image)}}" onclick="focusImg(this.src)" />
            @endforeach
          </div>
        </div>
      @endif
      <?= $post->body; ?>
    </div>
    @if (isset($related_posts))
      <div class="recommend">
        <h2>บทความที่เกี่ยวข้อง Related Article</h2>
        <div style="border:1px solid #e3e3ec; margin:10px auto; width: 70%;" ></div>
        <div class="owl-carousel owl-theme owl-article">
          @foreach ($related_posts as $related_post)
            <div class="item">
              <a href="{{$related_post->id}}"><img src="/storage/{{$related_post->image}}" /></a>
              <h4>{{$related_post->title}}</h4>
            </div>
          @endforeach
        </div>
      </div>
    @endif

  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.owl-article').owlCarousel({
          loop:false,
          center:true,
          margin:10,
          nav:true,
          autoplay:true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          responsive:{
              400:{
                  items:2
              },
              600:{
                  items:3
              },
              1000:{
                  items:5
              }
          }
      });
      $('.owl-gallery').owlCarousel({
          loop:false,
          margin:50,
          nav:true,
          responsive:{
              400:{
                  items:2
              },
              600:{
                  items:3
              },
              1000:{
                  items:4
              }
          }
      });
    });
  </script>
@endsection
