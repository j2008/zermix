<h1 style="text-align:center;">{{$post->title}}</h1>
<a class="fancybox" href="<?= Voyager::image($post->image) ?>" rel="gallery_01"><img src="<?= Voyager::image($post->image) ?>"></a>
<div class="detail-text">
  <?= $post->body ?>
</div>
