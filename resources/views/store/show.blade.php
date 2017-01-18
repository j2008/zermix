<h3 style="text-align:center;">{{$post->title}}</h3>
@if ($post->image)
  <a class="fancybox" href="<?= Voyager::image($post->image) ?>" rel="gallery_01"><img src="<?= Voyager::image($post->image) ?>"></a>
@endif
<div class="detail-text">
  <?= $post->body ?>
</div>
