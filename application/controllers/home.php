<?php

class Home_Controller extends Base_Controller {

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
        if (Auth::guest()) {
            Session::put('lastURL', URI::full());
        }

        Galleries::incrementViews($galleryID);
        $images = Images::fromGallery($galleryID);

        return View::make('home.gallery')
            ->with('images', $images)
            ->with('galleryID', $galleryID);
    }

    public function action_image($galleryID, $imageID)
    {
        if (Auth::guest()) {
            Session::put('lastURL', URI::full());
            return Redirect::to('login');
        }

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
        if (Auth::guest()) {
            return;
        }

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

}