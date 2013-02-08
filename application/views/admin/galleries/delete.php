<?=render('includes.header_admin'); ?>
<?=render('includes.navbar_admin'); ?>

<div class="container" id="content">

<div class="row">
<div class="span4 offset4">
<form class="well" action="<?=Url::to('admin/galleries/delete/'.$gallery->id); ?>" method="post" accept-charset="utf-8">
	<p>You really want to delete the Gallery:<br><b><?=$gallery->name; ?></b></p>
	<button type="submit" class="btn btn-block btn-danger"><i class="icon-trash icon-white"></i> Delete Gallery</button>
</form>
</div>
</div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
