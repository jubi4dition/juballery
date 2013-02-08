<?=render('includes.header_admin'); ?>
<?=render('includes.navbar_admin'); ?>

<div class="container" id="content">

<div class="row">
<div class="span4 offset4">
<form class="well" action="<?=Url::to('admin/users/create'); ?>" method="post" accept-charset="utf-8">
	<div class="input-prepend">
		<span class="add-on"><i class="icon-envelope"></i></span>
		<input type="email" class="span3" name="userEmail" placeholder="Email" required maxlength="60" autofocus />
	</div>
	<br>
	<div class="input-prepend">
		<span class="add-on"><i class="icon-lock"></i></span>
		<input type="text" class="span3" name="userPassword" placeholder="Password" required maxlength="60" />
	</div>
	<br>
	<button type="submit" class="btn btn-block btn-success"><i class="icon-plus icon-white"></i> Create new User</button>
</form>
</div>
</div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
