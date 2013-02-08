<?=render('includes.header'); ?>
<?=render('includes.navbar'); ?>
<div class="container" id="content">
<div class="row">
<div class="span4 offset4">
<form class="well" action="<?=Url::to('signup/check'); ?>" method="post" accept-charset="utf-8">
	<div class="input-prepend">
		<span class="add-on"><i class="icon-envelope"></i></span>
		<input type="text" class="span3" name="email" placeholder="Email" required maxlength="60" autofocus />
	</div>
	<br>
	<div class="input-prepend">
		<span class="add-on"><i class="icon-envelope"></i></span>
		<input type="text" class="span3" name="email2" placeholder="Repeat Email" required maxlength="60" />
	</div>
	<br>
	<div class="input-prepend">
		<span class="add-on"><i class="icon-lock"></i></span>
		<input type="password" class="span3" name="password" placeholder="Password" required maxlength="20" />
	</div>
	<br>
	<div class="input-prepend">
		<span class="add-on"><i class="icon-lock"></i></span>
		<input type="password" class="span3" name="password2" placeholder="Repeat Password" required maxlength="20" />
	</div>
	<br>
	<button type="submit" class="btn btn-block btn-primary">
	<i class="icon-edit icon-white"></i> Sign up</button>
</form>
</div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
