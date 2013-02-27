<?=render('includes.header'); ?>
<?=render('includes.navbar'); ?>
<div class="container" id="content">
<div class="row">
<div class="span4 offset4">
<form id="formSignup" class="well" action="<?=Url::to('signup/check'); ?>" method="post" accept-charset="utf-8">
  <div class="input-prepend">
    <span class="add-on"><i class="icon-envelope"></i></span>
    <input type="email" class="span3" name="email" placeholder="Your Email" required maxlength="60" autofocus />
  </div>
  <br>
  <div class="input-prepend">
    <span class="add-on"><i class="icon-lock"></i></span>
    <input type="text" class="span3" name="password" placeholder="Your Password" required maxlength="60" />
  </div>
  <br>
  <button type="submit" class="btn btn-block btn-primary">
  <i class="icon-edit icon-white"></i> Sign up</button>
  <a id="successLink" href="<?=Url::to('home'); ?>" class="btn btn-block btn-success" style="display: none">Successful, go to home!</a>
  <a id="errorLink" href="<?=Url::to('signup'); ?>" class="btn btn-block btn-danger" style="display: none">Error, try again!</a>
</form>
</div>

</div> <!-- /container -->

<!-- javascript -->
<script>

$(document).ready(function() {

  $('#formSignup').submit(function() {

    var form = $(this);
    var button = form.children('button');
    button.prop('disabled', true);
    
    var formUrl = form.attr('action');
    var formData = form.serialize();

    $.post(formUrl, formData, function(response) {
      
      if (response.success) {
        button.remove();
        $('#successLink').show();
      } else {
        button.remove();
        $('#errorLink').show();
      }     
    });

    return false;
  });

});

</script>

</body>
</html>
