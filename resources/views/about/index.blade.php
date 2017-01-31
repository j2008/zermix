@extends('layout')

@section('title', 'About')

@section('content')
  <img class="" style="max-width:100%;" src="<?= Voyager::image($page->image) ?>" >
  <div class="" style="padding:20px; border-bottom:1px solid #eae6e6;">
    <?= $page->body ?>
  </div>
@endsection
