<?=render('includes.header_admin'); ?>
<?=render('includes.navbar_admin'); ?>

<div class="container" id="content">

<div class="row">
<div class="span8 offset2">
	<h2>Welcome to the Admin Page</h2>

	<a href="<?=URL::to('admin/galleries') ?>" class="btn btn-large">
	<i class="icon-arrow-right"></i> Manage Galleries</a>
	<br><br>
	<a href="<?=URL::to('admin/users') ?>" class="btn btn-large">
	<i class="icon-arrow-right"></i> Manage Users</a>
	</div>
</div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
