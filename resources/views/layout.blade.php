<!DOCTYPE html>
<html>
    <head>
        <title>Zermix - @yield('title')</title>
        <meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/jquery-1.11.3.min.js" type="text/javascript" data-library="jquery" data-version="1.11.3"></script>
        <script src="js/main.js" type="text/javascript" ></script>
    </head>
    <body>
        <!-- header -->
        <div class="header-top">
          <div class="nav-bar-mobile">
            <img class="mobile-menu" src="img/mobile-menu.png" >
            <ul class="mobile-list slider" id="slider">
              <li><a href="">หน้าแรก</a></li>
              <li><a href="">เกี่ยวกับ Zermix</a></li>
              <li><a href="">ผลิตภัณฑ์</a></li>
              <li><a href="">สถานที่จำหน่าย</a></li>
              <li><a href="">สาระน่ารู้</a>
                <ul class="sub-menu">
                    <li><a href="">Feature Content</a></li>
                    <li><a href="">PR NEWS</a></li>
                    <li><a href="">User Review</a></li>
                </ul>
              </li>
              <li><a href="">ติดต่อเรา</a></li>
            </ul>
          </div>
          <div class="icon-logo col-sm-12">
            <?php $admin_logo_img = Voyager::setting('admin_icon_image', ''); ?>
            @if($admin_logo_img == '')
                <img class="logo-img" src="{{ asset('img/zermix-logo.png') }}" alt="Logo Icon">
            @else
                <img class="logo-img" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
            @endif
          </div>
          <img class="top-bar" src="{{ asset('img/topbar.png') }}" alt="top bar" >
          <div class="nav-bar">
            <ul>
              <li><a href="">หน้าแรก</a></li>
              <li><a href="">เกี่ยวกับ Zermix</a></li>
              <li><a href="">ผลิตภัณฑ์</a></li>
              <li><a href="">สถานที่จำหน่าย</a></li>
              <li><a href="">สาระน่ารู้</a>
                <ul class="sub-menu">
                    <li><a href="">Feature Content</a></li>
                    <li><a href="">PR NEWS</a></li>
                    <li><a href="">User Review</a></li>
                </ul>
              </li>
              <li><a href="">ติดต่อเรา</a></li>
            </ul>
          </div>
        </div>

        <!-- body -->
        @yield('content')

        <!-- footer -->
        <div class="footer">
          <div class="left-footer">
            <div><img src="img/call.png"/><p>+66 2 116 8041-2</p></div>
            <div><img src="img/location.png"/><p>5/151 ถนนเทศบาลสงเคราะห์ แขวงลาดยาว เขตจตุจักร กรุงเทพมหานคร 10900</p></div>
            <div><b><p>© Dermcorpharmaceutical.Zermix 2016</p></b></div>
          </div>
          <div class="right-footer">
            <img src="img/dermcor.png" />
          </div>
        </div>
    </body>
</html>
