<?php

class Likes {
    
    public static function has($imageID, $userID)
    {
        $liked = DB::table('likes')->where_imageid_and_userid($imageID, $userID)->get();
        return (count($liked) !== 0) ? true : false;
    }

    public static function add($imageID, $userID)
    {
        return DB::table('likes')->insert(array('imageid' => $imageID, 'userid' => $userID));
    }

}
