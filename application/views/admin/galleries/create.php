<?=render('includes.header_admin'); ?>
<?=render('includes.navbar_admin'); ?>

<div class="container" id="content">

<div class="row">
<div class="span4 offset4">
<form class="well" action="<?=Url::to('admin/galleries/create'); ?>" method="post" accept-charset="utf-8">
	<div class="input-prepend">
		<span class="add-on"><i class="icon-folder-open"></i></span>
		<input type="text" class="span3" name="galleryName" placeholder="Gallery Name" required maxlength="60" autofocus />
	</div>
	<br>
	<button type="submit" class="btn btn-block btn-success"><i class="icon-plus icon-white"></i> Create new Gallery</button>
</form>
</div>
</div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
