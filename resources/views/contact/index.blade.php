@extends('layout')

@section('title', 'Contact')

@section('header')
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Scripts -->
  <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
  </script>
@endsection

@section('content')
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="contact-form">
    <h1>ติดต่อเรา | Contact us</h1>
    <form id="sendmail" method="post" action="/ship">
      {{ csrf_field() }}
      <input type="text" name="title" id="title" placeholder="หัวข้อ title" required />
      <input type="email" name="email_reply" id="email_reply" placeholder="Your email for reply"
        pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-‌​9-]+)*" required />
      <textarea id="comment" name="comment" form="sendmail" placeholder="Enter text here..." required ></textarea>
      <input type="image" name="submit" src="/img/send.png" border="0" alt="Submit" id="submit" value="Submit" />
    </form>
  </div>

  <style>
    .contact-form{
      text-align: center;
    }
    #sendmail{
      max-width: 720px;
      margin: auto;
    }
    #title{
      width: 48%;
      margin: 2px 1px;
      padding: 2px;
      border: 1px solid #e2dbdb;
    }
    #email_reply{
      width: 48%;
      margin: 2px 1px;
      padding: 2px;
      border: 1px solid #e2dbdb;
    }
    #comment{
      width: 97%;
      display: block;
      margin: auto;
      height: 200px;
      padding: 2px;
      border: 1px solid #e2dbdb;
    }
    #submit{
      width: 80px;
      top: -40px;
      position: relative;
    }
  </style>
@endsection
