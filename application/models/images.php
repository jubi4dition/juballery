<?php

class Images {
    
    public static function getAll()
    {
        return DB::table('images')->get();
    }

    public static function getFirst($gid)
    {
        $first = DB::table('images')->where_gid($gid)->first();
        if ($first != null) {
            return $first->name;
        } else {
            return "null.jpg";
        }
    }

    public static function fromGallery($gid)
    {
        return DB::table('images')->where_gid($gid)->get();
    }

    public static function get($id)
    {
        return DB::table('images')->where_id($id)->first();
    }

    public static function create($gid, $name)
    {
        return DB::table('images')->insert(array(
            'gid' => $gid, 'name' => $name));
    }

    public static function incrementViews($id)
    {
        DB::table('images')->where_id($id)->increment('views');
    }

    public static function incrementLikes($id)
    {
        DB::table('images')->where_id($id)->increment('likes');
    }
}
