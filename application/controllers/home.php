<?php

class Home_Controller extends Base_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->filter('before', 'auth')->only(array('image', 'like'));
    }

    public function action_index()
    {
        $galleries = Galleries::getAll();
        foreach ($galleries as $gallery) {
            $gallery->thumb = Images::getFirst($gallery->id);
        }

        return View::make('home.index')
            ->with('galleries', $galleries);
    }

    public function action_gallery($galleryID)
    {
        Galleries::incrementViews($galleryID);
        $images = Images::fromGallery($galleryID);
        return View::make('home.gallery')
            ->with('images', $images)
            ->with('galleryID', $galleryID);
    }

    public function action_image($galleryID, $imageID)
    {
        $image = Images::get($imageID);
        
        if ($image != null) {
            Images::incrementViews($imageID);
        
            $liked = Likes::has($imageID, Auth::user()->id);

            return View::make('home.image')
                ->with('image', $image)
                ->with('galleryID', $galleryID)
                ->with('liked', $liked);
        } else {
            return "Image does not exists!";
        }
        
    }

    public function action_like()
    {
        $imageID = Input::get('imageid');
        $userID = Auth::user()->id;
        
        Likes::add($imageID, $userID);
        Images::incrementLikes($imageID);

        if (Request::ajax()) {
            return Response::json(array('success' => true));
        } else {
            return Redirect::to('home');
        }   
    }

    public function action_user()
    {
        return View::make('home.user');
    }

    public function action_user_password()
    {
        $validation = Validator::make(Input::get(), array('newPassword' => 'required|max:30'));
        
        if ($validation->fails()) {
            return Response::json(array('success' => false));
        }

        $password = Input::get('newPassword');
        $userID = Auth::user()->id;

        Users::password($userID, $password);

        return Response::json(array('success' => true));
    }


    public function action_test()
    {
        //return Str::random(32);
        //$allowedExtensions = array('jpg');
        // max file size in bytes
        //$sizeLimit = 10 * 1024 * 1024;
        //$uploader = new qqFileUploader($allowedExtensions);
        //Fineuploader::init();
        //$name = Fineuploader::name();
        //$dir = '6';
        //echo path('public').'images'.DIRECTORY_SEPARATOR;
        //File::mkdir(path('public').'images/'.$dir);
        /*$credentials = array('username' => 'admin@mail.com', 'password' => 'password');

        if (Auth::attempt($credentials)) {
            echo "Logged in!";
        } else {
            echo "Not logged in!";
        }*/
        /*Bundle::start('resizer');
        
        //$img = File::get(path('public').'images/2/messi003.jpg');
        $success = Resizer::open( path('public').'images/2/messi003.jpg' )
            ->resize( 300 , 300 , 'landscape' )
            ->save( path('public').'images/hh.jpg' , 90 );

        if ( $success ) {
            return 'woohoo';
        } else {
            return 'lame';
        }*/
        //return DB::table('galleries')->where_id(6)->delete();
        //return File::rmdir(path('public').'images/6');
    }

}