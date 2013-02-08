<?php

class Signup_Controller extends Base_Controller {

    public function action_index()
    {
        return View::make('signup.index');
    }

    public function action_check()
    {
        $rules = array(
            'email' => 'required|email|max:60',
            'password' => 'required|max:60'
        );

        $validation = Validator::make(Input::get(), $rules);
        
        if ($validation->fails()) {
            return Redirect::to('signup');
        }

        $email = Input::get('email');
        $password = Input::get('password');
        Users::create($email, $password);

        return Redirect::to('home');
    }

}
