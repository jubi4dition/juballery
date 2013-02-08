<?php

class Login_Controller extends Base_Controller {

    public function action_index()
    {
        if (Auth::guest()) {
            return View::make('login.index');
        } else {
            return Redirect::to('home');
        }
    }

    public function action_check()
    {
        $rules = array(
            'email' => 'required|max:60',
            'password' => 'required|max:60'
        );

        $validation = Validator::make(Input::get(), $rules);
        
        if ($validation->fails()) {
            return Redirect::to('login');
        }

        $email = Input::get('email');
        $password = Input::get('password');
        $credentials = array('username' => $email, 'password' => $password);
        
        if (Auth::attempt($credentials)) {
            if (Users::isAdmin(Auth::user()->id)) {
                Session::put('isAdmin', true);
            } else {
                Session::put('isAdmin', false);
            }

            return Redirect::to('home');
        } else {
            return Redirect::to('login');
        }
    }

    public function action_logout()
    {
        Auth::logout();
        return Redirect::to('home');
    }

}
