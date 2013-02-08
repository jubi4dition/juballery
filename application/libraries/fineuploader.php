<?php

require('fineuploader/qqfile.php');

class Fineuploader {
 
 	static $uploader;
    static $uploadDirectory;

    public static function init($uploadDirectory) {
        self::$uploader = new qqFileUploader(array('jpg'));
        self::$uploadDirectory = $uploadDirectory;
    }

    public static function getName() {
        return self::$uploader->getName();
    }

     public static function getUploadName() {
        return self::$uploader->getUploadName();
    }

    public static function upload($filename) {
        return self::$uploader->handleUpload(self::$uploadDirectory, $filename);
    }
}
