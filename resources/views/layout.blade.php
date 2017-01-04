<!DOCTYPE html>
<html>
    <head>
        <title>Zermix - @yield('title')</title>
    </head>
    <body>
        <!-- header -->
        <div class="icon-logo">
          <?php $admin_logo_img = Voyager::setting('admin_icon_image', ''); ?>
          @if($admin_logo_img == '')
              <img class="logo-img" src="{{ asset('img/zermix-logo.png') }}" alt="Logo Icon">
          @else
              <img class="logo-img" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
          @endif
          <img class="topbar" src="{{ asset('img/topbar.png') }}" alt="top bar" >
        </div>
        @yield('content')
    </body>
</html>
