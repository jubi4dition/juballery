<?php

class Admin_Controller extends Base_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->filter('before', 'authAdmin');
    }

    public function action_index()
    {
        return View::make('admin.index');
    }

}
