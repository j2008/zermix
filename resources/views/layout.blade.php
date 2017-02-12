<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | Zermix</title>
        <meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Athiti:400" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <script src="/js/jquery-1.11.3.min.js" type="text/javascript" data-library="jquery" data-version="1.11.3"></script>
        <script src="/js/main.js" type="text/javascript" ></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-91398632-1', 'auto');
          ga('send', 'pageview', location.pathname);
        </script>
        @yield('header')
        <meta property="og:image" content="https://www.zermix.com/img/content_banner.jpg" />
    </head>
    <body>
        <!-- header -->
        <div class="header-top">
          <div class="nav-bar-mobile">
            <img class="mobile-menu" src="/img/mobile-menu.png" >
            <ul class="mobile-list slider" id="slider">
              <li><a href="/">หน้าแรก</a></li>
              <li><a href="/about">เกี่ยวกับ Zermix</a></li>
              <li><a href="/product">ผลิตภัณฑ์</a></li>
              <li><a href="/store">สถานที่จำหน่าย</a></li>
              <li><a href="/feature">สาระน่ารู้</a>
              <!--
                <ul class="sub-menu">
                    <li><a href="/feature">Feature Content</a></li>
                    <li><a href="/pr">PR NEWS</a></li>
                    <li><a href="/review">User Review</a></li>
                </ul>
              -->
              </li>
              <li><a href="/contact">ติดต่อเรา</a></li>
            </ul>
          </div>
          <div class="icon-logo col-sm-12">
            <?php $admin_logo_img = Voyager::setting('admin_icon_image', ''); ?>
            @if($admin_logo_img == '')
                <img class="logo-img" src="{{ asset('/img/zermix-logo.png') }}" alt="Logo Icon">
            @else
                <img class="logo-img" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
            @endif
          </div>

          <div class="social-layout">
            <a href="https://web.facebook.com/zermix.zermix" target="_blank"><img class="social social-fb" src="/img/facebook-icon.png" /></a>
            <a href="" target="_blank" onclick="alert('coming soon!'); return false;"><img class="social social-ig" src="/img/ig-icon.png" /></a>
            <a href="" target="_blank" onclick="alert('coming soon!'); return false;"><img class="social social-line" src="/img/line-icon.png" /></a>
          </div>

          <img class="top-bar" src="{{ asset('/img/topbar.png') }}" alt="top bar" >
          <div class="nav-bar">
            <ul>
              <li><a href="/">หน้าแรก</a></li>
              <li><a href="/about">เกี่ยวกับ Zermix</a></li>
              <li><a href="/product">ผลิตภัณฑ์</a></li>
              <li><a href="/store">สถานที่จำหน่าย</a></li>
              <li><a href="/feature">สาระน่ารู้</a>
              <!--
                <ul class="sub-menu">
                    <li><a href="/feature">Feature Content</a></li>
                    <li><a href="/pr">PR NEWS</a></li>
                    <li><a href="/review">User Review</a></li>
                </ul>
              -->
              </li>
              <li><a href="/contact">ติดต่อเรา</a></li>
            </ul>
          </div>
        </div>

        <!-- body -->
        @yield('content')

        <!-- footer -->
        <div class="footer">
          <div class="left-footer">
            <div><img src="/img/call.png"/><p>+66 2 116 8041-2</p></div>
            <div><img src="/img/location.png"/><p>5/151 ถนนเทศบาลสงเคราะห์ แขวงลาดยาว เขตจตุจักร กรุงเทพมหานคร 10900</p></div>
            <div><b><p>© Dermcorpharmaceutical.Zermix 2016</p></b></div>
          </div>
          <div class="right-footer">
            <a href="http://www.dermcorpharma.com" target="_blank"><img src="/img/dermcor.png" /></a>
          </div>
        </div>
    </body>
</html>
