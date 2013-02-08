<?=render('includes.header'); ?>
<?=render('includes.navbar'); ?>

<div class="container" id="content">

<div class="row">
<div class="span">
  <div class="image-place" style="display:none">
    <div class="image-holder">
    <img src="<?=URL::to_asset('images/'.$galleryID.'/'.$image->name); ?>">
  </div>
  <div class="image-bar">
    <div class="image-stat"><i class="icon-eye-open"></i> <?=$image->views; ?></div>
    <div class="image-stat"><i class="icon-heart"></i> <?=$image->likes; ?></div>
    <div class="pull-right">
      <? if ($liked): ?>
        <button class="btn btn-danger" type="button" disabled><i class="icon-heart icon-white"></i> Liked!</button>
      <? else: ?>
        <form id="formLike" action="<?=Url::to('home/like'); ?>" method="post" accept-charset="utf-8">
          <input type="hidden" name="imageid" value="<?=$image->id; ?>">
          <button class="btn btn-danger" type="submit"><i class="icon-heart icon-white"></i> Like it!</button>
        </form>
      <? endif; ?>
    </div>
  </div>
  
  </div>
</div>
</div>
<br>
<a href="<?=Url::to('home/gallery/'.$galleryID); ?>" class="btn btn-primary"><i class="icon-arrow-left icon-white"></i> Back to Gallery</a>

</div> <!-- /container -->

<!-- javascript -->
<script>

$(document).ready(function() {

  $('#formLike').submit(function() {

    console.log('submit');
    var form = $(this);
    var button = form.children('button');
    button.prop('disabled', true);
    button.text('...');

    var formUrl = form.attr('action');
    var formData = form.serialize();

    $.post(formUrl, formData, function(response) {
      
      if (response.success) {
        button.html('<i class="icon-heart icon-white"></i> Liked!');
      } else {
        button.text('Error');
      }     
    });

    return false;
  });

  $('.image-place').fadeIn(1000);
});

</script>

</body>
</html>
