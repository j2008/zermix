@extends('layout')

@section('title', 'Post')

@section('header')
  <script src="/js/content.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="/css/content.css">
  <link rel="stylesheet" href="/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/owl.theme.default.min.css">
  <script src="/js/owl.carousel.min.js"></script>
@endsection

@section('content')
  <div class="post-body">
    <h1>{{$post->title}}</h1>
    <div class="content-text">
      <div style="text-align: center;">
        <img src="/storage/<?= $post->image; ?>" />
      </div>
      <?= $post->body; ?>
    </div>
    @if (isset($related_posts))
      <div class="recommend">
        <h2>บทความที่เกี่ยวข้อง Related Article</h2>
        <div style="border:1px solid #e3e3ec; margin:10px auto; width: 70%;" ></div>
        <div class="owl-carousel owl-theme">
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
      $('.owl-carousel').owlCarousel({
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
      })
    });
  </script>
@endsection
