@extends('layout')

@section('title', 'Home')

@section('header')
  <script src="js/jssor.slider-22.0.15.mini.js" type="text/javascript" data-library="jssor.slider.mini" data-version="22.0.15"></script>
  <link rel="stylesheet" href="/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/owl.theme.default.min.css">
  <script src="/js/owl.carousel.min.js"></script>
  <meta name="description" content="ZERMIX กลุ่มผลิตภัณฑ์ดูแลผิวแห้ง ผิวบอบบาง ผิวแพ้ง่ายโดยเฉพาะ ผลิตภัณฑ์เซอร์มิกซ์ ได้รับการยอมรับจากผู้เชี่ยวชาญด้านผิวหนังมาแล้วกว่า 7 ปี ทั้งจากโรงพยาบาลรัฐ  โรงพยาบาลเอกชน และคลินิกผิวหนังทั่วประเทศไทย">
@endsection

@section('content')
  <script type="text/javascript">
      jQuery(document).ready(function ($) {
          $('.owl-carousel').owlCarousel({
              loop:true,
              margin:10,
              nav:true,
              autoplay:true,
              autoplayTimeout:3000,
              autoplayHoverPause:true,
              responsive:{
                  0:{
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

          var jssor_1_options = {
            $AutoPlay: true,
            $SlideDuration: 800,
            $SlideEasing: $Jease$.$OutQuint,
            $CaptionSliderOptions: {
              $Class: $JssorCaptionSlideo$,
            },
            $ArrowNavigatorOptions: {
              $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
              $Class: $JssorBulletNavigator$
            }
          };

          var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

          /*responsive code begin*/
          /*you can remove responsive code if you don't want the slider scales while window resizing*/
          function ScaleSlider() {
              var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
              if (refSize) {
                  refSize = Math.min(refSize, 1920);
                  jssor_1_slider.$ScaleWidth(refSize);
              }
              else {
                  window.setTimeout(ScaleSlider, 30);
              }
          }
          ScaleSlider();
          $(window).bind("load", ScaleSlider);
          $(window).bind("resize", ScaleSlider);
          $(window).bind("orientationchange", ScaleSlider);
          /*responsive code end*/
      });
    </script>
    <style>
      .item img{
        max-width: 200px;
        max-height: 200px;
      }
      /* jssor slider bullet navigator skin 05 css */
      /*
      .jssorb05 div           (normal)
      .jssorb05 div:hover     (normal mouseover)
      .jssorb05 .av           (active)
      .jssorb05 .av:hover     (active mouseover)
      .jssorb05 .dn           (mousedown)
      */
      .jssorb05 {
          position: absolute;
      }
      .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
          position: absolute;
          /* size of bullet elment */
          width: 16px;
          height: 16px;
          background: url('img/b05.png') no-repeat;
          overflow: hidden;
          cursor: pointer;
      }
      .jssorb05 div { background-position: -7px -7px; }
      .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
      .jssorb05 .av { background-position: -67px -7px; }
      .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

      /* jssor slider arrow navigator skin 22 css */
      /*
      .jssora22l                  (normal)
      .jssora22r                  (normal)
      .jssora22l:hover            (normal mouseover)
      .jssora22r:hover            (normal mouseover)
      .jssora22l.jssora22ldn      (mousedown)
      .jssora22r.jssora22rdn      (mousedown)
      .jssora22l.jssora22lds      (disabled)
      .jssora22r.jssora22rds      (disabled)
      */
      .jssora22l, .jssora22r {
          display: block;
          position: absolute;
          /* size of arrow element */
          width: 40px;
          height: 58px;
          cursor: pointer;
          background: url('img/a22.png') center center no-repeat;
          overflow: hidden;
      }
      .jssora22l { background-position: -10px -31px; }
      .jssora22r { background-position: -70px -31px; }
      .jssora22l:hover { background-position: -130px -31px; }
      .jssora22r:hover { background-position: -190px -31px; }
      .jssora22l.jssora22ldn { background-position: -250px -31px; }
      .jssora22r.jssora22rdn { background-position: -310px -31px; }
      .jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
      .jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }
    </style>
    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <a data-u="any" href="http://www.jssor.com" style="display:none">Full Width Slider</a>
            <div data-p="225.00" style="display:none;">
              <a href="<?= Voyager::setting('pickup_slide_url') ?>">
                <img data-u="image" src="<?= Voyager::image('slideshow/Banner1.png') ?>" />
              </a>
            </div>
            <div data-p="225.00" style="display:none;">
                <a href="<?= Voyager::setting('pickup_slide_url') ?>">
                  <img data-u="image" src="<?= Voyager::image('slideshow/Banner2.png') ?>" />
                </a>
            </div>
            <div data-p="225.00" style="display:none;">
                <a href="<?= Voyager::setting('pickup_slide_url') ?>">
                  <img data-u="image" src="<?= Voyager::image('slideshow/Banner3.png') ?>" />
                </a>
            </div>
            <div data-p="225.00" style="display:none;">
                <a href="<?= Voyager::setting('pickup_slide_url') ?>">
                  <img data-u="image" src="<?= Voyager::image('slideshow/Banner4.png') ?>" />
                </a>
            </div>
            <div data-p="225.00" style="display:none;">
                <a href="<?= Voyager::setting('pickup_slide_url') ?>">
                  <img data-u="image" src="<?= Voyager::image('slideshow/Banner5.png') ?>" />
                </a>
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>
    <div style="padding:5px 0px">
      <div class="video-home">
        <iframe src="https://www.youtube.com/embed/a_NoiaqcX-E" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="video-home">
        <iframe src="https://www.youtube.com/embed/stwMXERLquk" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="video-home">
        <iframe src="https://www.youtube.com/embed/kzbdYaPd1uY" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <div style="text-align:center;"><h2>Our Product</h2></div>
    <div style="border:1px solid #e3e3ec; margin:10px auto; width: 70%;" ></div>
    <div class="owl-carousel owl-theme">
      @foreach ($posts as $post)
        <div class="item">
          <a href="/post/{{$post->id}}"><img src="/storage/{{$post->image}}" /></a>
          <h4 style="text-align:center;">{{$post->title}}</h4>
        </div>
      @endforeach
    </div>
    <!-- <div style="border-top:1px solid #e3e3ec; margin:10px auto; width: 100%;" ></div> -->
@endsection
