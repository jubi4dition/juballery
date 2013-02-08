<?=render('includes.header'); ?>
<?=render('includes.navbar'); ?>

<div class="container" id="content">

<? if (Auth::check()): ?>
<div class="row">
<? $i = 1; ?>
<? foreach ($images as $image): ?>

<div class="span3">
  <div class="image-place">
  <div class="image-bar">
    <div class="image-stat"><i class="icon-eye-open"></i> <?=$image->views; ?></div>
    <div class="image-stat"><i class="icon-heart"></i> <?=$image->likes; ?></div>
  </div>
  <div class="image-holder">
    <a href="<?=URL::to_action('home@image', array($galleryID, $image->id)); ?>">
      <img src="<?=URL::to_asset('images/'.$galleryID.'/thumbs/'.$image->name); ?>">
    </a>
  </div>
  </div>
</div>
<? if (($i != 0) && (($i % 4) == 0)) echo '</div><div class="row">'; ?>
<? $i++; ?>
<? endforeach; ?>
</div>

<? else: ?>

<div class="row">
<div class="span12">
<div class="alert alert-danger">
  <b>Warning!</b> You can only open the images if you are logged in!
</div>
</div>
</div>

<div class="row">
<? $i = 1; ?>
<? foreach ($images as $image): ?>
<div class="span3">
  <div class="image-place">
  <div class="image-bar">
    <div class="image-stat"><i class="icon-eye-open"></i> <?=$image->views; ?></div>
    <div class="image-stat"><i class="icon-heart"></i> <?=$image->likes; ?></div>
  </div>
  <div class="image-holder">
      <img src="<?=URL::to_asset('images/'.$galleryID.'/thumbs/'.$image->name); ?>">
  </div>
  </div>
</div>
<? if (($i % 4) == 0) echo '</div><div class="row">'; ?>
<? $i++; ?>
<? endforeach; ?>
</div>
<? endif; ?>


</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
