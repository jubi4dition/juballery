<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Juballery - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Le styles -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <?=HTML::style('fineuploader/fineuploader.css'); ?>
  <?=HTML::style('css/bootstrap.css'); ?>
  <style>
    body {
      background-image: url(<?=URL::to_asset('img/bg3.png'); ?>);
      padding-top: 60px;
    }
    /* Fine Uploader
      -------------------------------------------------- */
    .qq-upload-list {
      text-align: left;
    }
    /* For the bootstrapped demos */
    li.alert-success {
      background-color: #DFF0D8;
    }
    li.alert-error {
      background-color: #F2DEDE;
    }
    .alert-error .qq-upload-failed-text {
      display: inline;
    }
  </style>
  <?=HTML::style('css/bootstrap-responsive.css'); ?>
  <?=HTML::script('js/jquery.js'); ?>
  <?=HTML::script('js/bootstrap.js'); ?>
  <?=HTML::script('fineuploader/jquery.fineuploader-3.1.1.js'); ?>
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="<?=URL::to_asset('favicon.ico'); ?>">
</head>
<body>

<?=render('includes.navbar_admin'); ?>

<div class="container" id="content">

<div class="row">
<div class="span8 offset2">
<p>Gallery: <b><?=$gallery->name; ?></b></p>
</div>
<div id="jquery-wrapped-fine-uploader"></div>
</div>

</div> <!-- /container -->

<!-- JavaScript -->
<script>

$(document).ready(function () {

  $('#jquery-wrapped-fine-uploader').fineUploader({
    request: {
      endpoint: '<?=URL::to("admin/galleries/upload/".$gallery->id); ?>',
      params: { 'gid' : <?=$gallery->id; ?> },
    },
    text: {
      uploadButton: 'Upload Your Images'
    },
    template: 
    '<div class="qq-uploader span8 offset2">' +
      '<pre class="qq-upload-drop-area span12"><span>{dragZoneText}</span></pre>' +
      '<div class="qq-upload-button btn btn-success" style="width: auto;">{uploadButtonText}</div>' +
      '<span class="qq-drop-processing"><span>{dropProcessingText}</span><span class="qq-drop-processing-spinner"></span></span>' +
      '<ul class="qq-upload-list" style="margin-top: 10px; text-align: center;"></ul>' +
    '</div>',
    classes: {
      success: 'alert alert-success',
      fail: 'alert alert-error'
    },
    debug: true
  });

});

</script>

</body>
</html>
