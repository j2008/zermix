@extends('layout')

@section('title', 'Not found page')

@section('content')
  <div style="text-align:center;">
    <h1 style="margin:50px;">ไม่พบหน้าที่ต้องการ Page Not found</h1>
  </div>

  <script type="text/javascript">
    setTimeout(function(){
      window.location = "/";
    },2000)
  </script>
@endsection
