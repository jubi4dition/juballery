<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?=URL::to('admin'); ?>">Juballery Admin</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li><a href="<?=URL::to('admin'); ?>">Home</a></li>
          <li><a href="<?=URL::to('admin/galleries'); ?>">Galleries</a></li>
          <li><a href="<?=URL::to('admin/users'); ?>">Users</a></li>
          <a href="<?=URL::to('home') ?>" class="btn btn-danger"><i class="icon-flag icon-white"></i> Gallery Page</a>
        </ul>
        <div class="pull-right">
          <? if (Auth::check()): ?> 
            <a href="<?=URL::to('login/logout') ?>" class="btn btn-primary"><i class="icon-road icon-white"></i> Logout</a>
          <? else: ?>
            <a href="<?=URL::to('login') ?>" class="btn btn-primary"><i class="icon-home icon-white"></i> Login</a>
          <? endif; ?>
        </div>
      </div
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
