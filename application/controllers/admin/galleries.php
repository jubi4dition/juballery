<?php

class Admin_Galleries_Controller extends Base_Controller {

    public $restful = true;

    public function __construct()
    {
        parent::__construct();
        $this->filter('before', 'authAdmin');
    }

    public function get_index()
    {
        $galleries = Galleries::getAll();

        return View::make('admin/galleries.index')
            ->with('galleries', $galleries);
    }

    public function get_create()
    {
        return View::make('admin/galleries.create');
    }

    public function post_create()
    {
        $validation = Validator::make(Input::get(), array('galleryName' => 'required|max:60'));
        
        if ($validation->fails()) {
            return Redirect::to('admin/galleries');
        }

        $galleryName = Input::get('galleryName');
        $galleryID = Galleries::create($galleryName);
        File::mkdir(path('public').'images/'.$galleryID);
        File::mkdir(path('public').'images/'.$galleryID.'/thumbs');

        return Redirect::to('admin/galleries');
    }

    public function get_edit($galleryID)
    {
        $gallery = Galleries::get($galleryID);

        if ($gallery != null) {
            return View::make('admin/galleries.edit')
                ->with('gallery', $gallery);
        } else {
            return "Error";
        }
    }

    public function post_edit($galleryID)
    {
        $validation = Validator::make(Input::get(), array('galleryName' => 'required|max:60'));
        
        if ($validation->fails()) {
            return Redirect::to('admin/galleries');
        }

        Galleries::edit($galleryID, Input::get('galleryName'));

        return Redirect::to('admin/galleries');
    }

    public function get_delete($galleryID)
    {
        $gallery = Galleries::get($galleryID);

        if ($gallery != null) {
            return View::make('admin/galleries.delete')
                ->with('gallery', $gallery);
        } else {
            return "Error";
        } 
    }

    public function post_delete($galleryID)
    {
        Galleries::delete($galleryID);
        File::rmdir(path('public').'images/'.$galleryID);

        return Redirect::to('admin/galleries');
    }

    public function get_upload($galleryID)
    {
        $gallery = Galleries::get($galleryID);

        if ($gallery != null) {
            return View::make('admin/galleries.upload')
                ->with('gallery', $gallery);
        } else {
            return "Error";
        }
    }

    public function post_upload($galleryID)
    {
        $path = path('public').'images/'.$galleryID;
        Fineuploader::init($path);
        $name = Fineuploader::getName();
        $fuResponse = Fineuploader::upload($name);

        if (isset($fuResponse['success']) && ($fuResponse['success'] == true)) {
            $file = Fineuploader::getUploadName();
            
            Bundle::start('resizer');
            $success = Resizer::open($file)
                ->resize(300, 300, 'landscape')
                ->save($path.'/thumbs/'.$name , 90 );
            
            Images::create($galleryID, $name);
        }

        return Response::json($fuResponse);
    }

}
