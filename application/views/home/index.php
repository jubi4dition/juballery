<?=render('includes.header'); ?>
<?=render('includes.navbar'); ?>

<div class="container" id="content">

<div class="row">

<? $i = 1; ?>
<? foreach ($galleries as $gallery): ?>
<div class="span3">
  <div class="image-place">
  <div class="image-bar">
    <div class="image-stat"><i class="icon-eye-open"></i> <?=$gallery->views; ?></div>
    <b><?=$gallery->name; ?></b>
  </div>
  <div class="image-holder">
    <a href="<?=URL::to('home/gallery/'.$gallery->id); ?>">
      <img src="<?=URL::to_asset('images/'.$gallery->id.'/'.$gallery->thumb); ?>">
    </a>
  </div>
  </div>
</div>
<? if (($i % 4) == 0) echo '</div><div class="row">'; ?>
<? $i++; ?>
<? endforeach; ?>

</div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
