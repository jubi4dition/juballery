<?=render('includes.header_admin'); ?>
<?=render('includes.navbar_admin'); ?>

<div class="container" id="content">

<? if (isset($error)): ?>
<div class="row">
  <div class="span8 offset2"> 
    <div id="errorMessage" class="alert alert-error"><?=$error; ?></div>
  </div>
</div>
<? endif; ?>

<div class="row">
<div class="span8 offset2">
<a href="<?=URL::to('admin/galleries/create'); ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Create new Gallery</a>
</div>
</div>
<br>
<div class="row">
<div class="span8 offset2">
<table class="table">
<thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Actions</th>
  </tr>
</thead>
<? foreach ($galleries as $gallery): ?>
<tr>
  <td><strong><?=$gallery->id; ?></strong></td>
  <td><strong><?=$gallery->name; ?></strong></td>
  <td>
    <a href="<?=URL::to('admin/galleries/upload/'.$gallery->id); ?>" class="btn btn-success">
    <i class="icon-upload icon-white"></i> Upload</a>
    <a href="<?=URL::to('admin/galleries/edit/'.$gallery->id); ?>" class="btn btn-warning">
    <i class="icon-pencil icon-white"></i> Edit</a>
    <a href="<?=URL::to('admin/galleries/delete/'.$gallery->id); ?>" class="btn btn-danger">
    <i class="icon-trash icon-white"></i> Delete</a>
  </td>
</tr>
<? endforeach; ?>
</table>
</div>
</div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
