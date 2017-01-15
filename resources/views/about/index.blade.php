@extends('layout')

@section('title', 'About')

@section('content')
  <img class="" style="max-width:100%;" src="<?= Voyager::image($page->image) ?>" >
  <div class="" style="padding:20px;">
    <?= $page->body ?>
  </div>
@endsection
