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
              <div>
                  <img data-u="image" src="img/slide2.jpg" />
                  <div data-u="caption" data-t="0" style="border-radius:0px 0px 0px 20px;position:absolute;top:0px;left:-400px;width:400px;height:30px;z-index:0;background-color:rgba(60, 54, 50, 0.8);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">
                    <p>Title</p>
                  </div>
                  <div data-u="caption" data-t="1" style="position:absolute;bottom:0px;left:-800px;width:800px;height:70px;z-index:0;background-color:rgba(60, 54, 50, 0.8);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">
                    <p>This is full customized content layer. This is full customized content layer. This is full customized content layer. This is full customized content layer.</p>
                  </div>
              </div>
              <div>
                  <img data-u="image" src="img/blue.jpg" />
                  <div data-u="caption" data-t="0" style="border-radius:0px 0px 0px 20px;position:absolute;top:0px;left:-400px;width:400px;height:30px;z-index:0;background-color:rgba(60, 54, 50, 0.8);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">
                    <p>Title</p>
                  </div>
                  <div data-u="caption" data-t="1" style="position:absolute;bottom:0px;left:-800px;width:800px;height:70px;z-index:0;background-color:rgba(60, 54, 50, 0.8);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">
                    <p>This is full customized content layer. This is full customized content layer. This is full customized content layer. This is full customized content layer.</p>
                  </div>
              </div>
              <div>
                  <img data-u="image" src="img/red.jpg" />
                  <div data-u="caption" data-t="0" style="border-radius:0px 0px 0px 20px;position:absolute;top:0px;left:-400px;width:400px;height:30px;z-index:0;background-color:rgba(60, 54, 50, 0.8);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">
                    <p>Title</p>
                  </div>
                  <div data-u="caption" data-t="1" style="position:absolute;bottom:0px;left:-800px;width:800px;height:70px;z-index:0;background-color:rgba(60, 54, 50, 0.8);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">
                    <p>This is full customized content layer. This is full customized content layer. This is full customized content layer. This is full customized content layer.</p>
                  </div>
              </div>
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
      <p>BANNER</p>
    </div>

    <div class="bar">
      <div class="selected-type sub-bar"><p><b>All news</b></p></div>
      <div class="sitemenu-title sub-bar"><p><b>Site Menu</b></p></div>
    </div>

    <div class="below-bar">
      <!-- left side content -->
      <div class="contents">
        <div class="type-choice">

        </div>
        <div class="contents-list">

        </div>
      </div>

      <!-- right side menu -->
      <div class="sitemenu">

      </div>
    </div>

  </div>

@endsection
