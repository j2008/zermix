<!DOCTYPE html>
<html>
    <head>
        <title>Zermix - @yield('title')</title>
        <meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <!-- header -->
        <div class="header-top">
          <div class="icon-logo col-sm-12">
            <?php $admin_logo_img = Voyager::setting('admin_icon_image', ''); ?>
            @if($admin_logo_img == '')
                <img class="logo-img" src="{{ asset('img/zermix-logo.png') }}" alt="Logo Icon">
            @else
                <img class="logo-img" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
            @endif
          </div>
          <img class="top-bar" src="{{ asset('img/topbar.png') }}" alt="top bar" >
          <div class="nav-bar col-sm-12">
            <ul>
              <li class="col-sm-2"><a href="">หน้าแรก</a></li>
              <li class="col-sm-2"><a href="">เกี่ยวกับ Zermix</a></li>
              <li class="col-sm-2"><a href="">ผลิตภัณฑ์</a></li>
              <li class="col-sm-2"><a href="">สถานที่จำหน่าย</a></li>
              <li class="col-sm-2"><a href="">สาระน่ารู้</a></li>
              <li class="col-sm-2"><a href="">ติดต่อเรา</a></li>
            </ul>
          </div>
        </div>
        @yield('content')
    </body>
</html>
