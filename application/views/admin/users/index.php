<?=render('includes.header_admin'); ?>
<?=render('includes.navbar_admin'); ?>

<div class="container" id="content">

<div class="row">
<div class="span8 offset2">
<a href="<?=URL::to('admin/users/create'); ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Create new User</a>
</div>
</div>
<br>
<div class="row">
<div class="span8 offset2">
<table class="table">
<thead>
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Actions</th>
  </tr>
</thead>
<? foreach ($users as $user): ?>
<tr>
  <td><strong><?=$user->id; ?></strong></td>
  <td><strong><?=$user->email; ?></strong></td>
  <td>
    <a href="<?=URL::to('admin/users/edit/'.$user->id); ?>" class="btn btn-warning">
    <i class="icon-refresh icon-white"></i> Reset Password</a>
    <a href="<?=URL::to('admin/users/delete/'.$user->id); ?>" class="btn btn-danger">
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
