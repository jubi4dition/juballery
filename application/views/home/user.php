<?=render('includes.header'); ?>
<?=render('includes.navbar'); ?>
<div class="container" id="content">

<div class="row">
<div class="span4 offset4">

<form id="formPass" class="well" action="<?=Url::to('home/user_password'); ?>" method="post" accept-charset="utf-8">
	<div class="input-prepend">
		<span class="add-on"><i class="icon-lock"></i></span>
		<input type="text" class="span3" name="newPassword" placeholder="New Password" required maxlength="30" />
	</div>
	<br>
	<button type="submit" class="btn btn-block btn-primary">
	<i class="icon-refresh icon-white"></i> Change Password</button>
</form>

</div>
</div>

<div class="row">
	<div class="span4 offset4">
		
		<div id="successMessage" class="alert alert-success" style="display: none">Password changed!</div>
		<div id="errorMessage" class="alert alert-error" style="display: none">Error!</div>
	
	</div>
</div>

</div> <!-- /container -->

<!-- javascript -->
<script>

$(document).ready(function() {

  $('#formPass').submit(function() {

    console.log('submit');
    var form = $(this);
    var button = form.children('button');
    var input = form.find('input');
    button.prop('disabled', true);
    input.blur();

    var formUrl = form.attr('action');
    var formData = form.serialize();

    $.post(formUrl, formData, function(response) {
      
      if (response.success) {
      	$('#successMessage').show();
      } else {
      	$('#errorMessage').show();
      }     
    });

    input.prop('disabled', true);

    return false;
  });

});

</script>

</body>
</html>