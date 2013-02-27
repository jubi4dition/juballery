<?php

class Users {
    
    public static function getAll()
    {
        return DB::table('users')->get();
    }

    public static function get($id)
    {
        return DB::table('users')->where_id($id)->first();
    }

    public static function create($email, $password)
    {
        if (DB::table('users')->where_email($email)->first() == null) {
            $hashedPassword = Hash::make($password);
            return DB::table('users')->insert(array('email' => $email, 'password' => $hashedPassword));
        } else {
            return false;
        }
    }

    public static function delete($id)
    {
        return DB::table('users')->where_id($id)->delete();
    }

    public static function password($id, $password)
    {
        $hashedPassword = Hash::make($password);
        return DB::table('users')->where_id($id)->update(array('password' => $hashedPassword));
    }

    public static function isAdmin($id)
    {
        $admin = DB::table('admins')->where_userid($id)->first();
        return ($admin != null) ? true : false;
    }

}
