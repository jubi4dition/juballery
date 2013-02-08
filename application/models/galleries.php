<?php

class Galleries {
    
    public static function getAll()
    {
        return DB::table('galleries')->get();
    }

    public static function get($id)
    {
        return DB::table('galleries')->where_id($id)->first();
    }

    public static function create($name)
    {
        return DB::table('galleries')->insert_get_id(array('name' => $name));
    }

    public static function edit($id, $name)
    {
        return DB::table('galleries')->where_id($id)->update(array('name' => $name));
    }

    public static function delete($id)
    {
        DB::table('galleries')->where_id($id)->delete();
    }

    public static function incrementViews($id)
    {
        DB::table('galleries')->where_id($id)->increment('views');
    }
}
