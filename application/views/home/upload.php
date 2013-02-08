<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Simple Gallery - Upload</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Le styles -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <?=HTML::style('fineuploader/fineuploader.css'); ?>
  <?=HTML::style('css/bootstrap.css'); ?>
  <style>
    body {
      background-image: url(<?=URL::to_asset('img/bg2.png'); ?>);
      padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    .image-place {
      border: 1px solid #ccc;
      border-radius: 2px;
    }
    .image-place:hover {
      border-color: #0088cc;
    }
    .image-bar {
      background-color: #f5f5f5;
      border-bottom: 1px solid #ccc;
      padding: 2px;
    }
    .image-holder {
      background-color: #FFF;
    }
    .image-holder img{
      border-radius: 2px;
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
<div class="span12">
  <!--form action="<?=URL::to('home/upload_files'); ?>" method="post" enctype="multipart/form-data">        
       <input type="file" multiple="multiple" name="files[]">
       <input name="submit" type="submit" value="Submit">    
  </form-->
  <form class="form-inline">
  <label>Select Gallery</label>
  <select id="gallery">
  <? foreach ($galleries as $gallery): ?>
  <option value="<?=$gallery->id; ?>"><?=$gallery->name; ?></option>
  <? endforeach; ?>
  </select>
  <button id="nextStep" type="button" class="btn btn-primary">Next Step</button>
</form>
  <div id="jquery-wrapped-fine-uploader"></div>
</div>
</div>


</div> <!-- /container -->
<script>
  $(document).ready(function () {
    $('#nextStep').click(function() {
      var gallery = $('#gallery').val();
      $('#gallery').prop('disabled', true);
      $('#nextStep').prop('disabled', true);


      $('#jquery-wrapped-fine-uploader').fineUploader({
        request: {
          endpoint: '<?=URL::to("home/upload_files"); ?>',
          params: { 'gid' : gallery},
        },
        text: {
          uploadButton: 'Upload Your Images'
        },
        template: 
        '<div class="qq-uploader span12">' +
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


    
  });
</script>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
