<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?=URL::to('home'); ?>">Juballery</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li><a href="#">Home</a></li>
          <li><a href="#">Most Views</a></li>
          <li><a href="#">Most Likes</a></li>
        <? if (Auth::check() && Session::get('isAdmin')): ?>
          <a href="<?=URL::to('admin') ?>" class="btn btn-danger"><i class="icon-flag icon-white"></i> Admin Page</a>
        <? endif; ?>
        </ul>
        <div class="pull-right">
          <? if (Auth::check()): ?> 
            <small class="navbar-text">User: <?=HTML::link('home/user', Auth::user()->email); ?></small>
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
