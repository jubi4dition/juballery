<?=render('includes.header_admin'); ?>
<?=render('includes.navbar_admin'); ?>

<div class="container" id="content">

<div class="row">
<div class="span4 offset4">
<form class="well" action="<?=Url::to('admin/users/edit/'.$user->id); ?>" method="post" accept-charset="utf-8">
	<p>User: <b><?=$user->email; ?></b></p>
	<div class="input-prepend">
		<span class="add-on"><i class="icon-lock"></i></span>
		<input type="text" class="span3" name="newUserPassword" placeholder="New Password" required maxlength="60" />
	</div>
	<br>
	<button type="submit" class="btn btn-block btn-warning"><i class="icon-plus icon-white"></i> Edit User Password</button>
</form>
</div>
</div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
