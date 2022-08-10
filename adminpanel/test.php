<?php
/**
 * Created by PhpStorm.
 * User: Alien Shrestha
 * Date: 8/1/2017
 * Time: 5:59 PM
 */

require_once "third_party/image_resize/ImageResize.php";

$image=new \Eventviva\ImageResize("user_uploads/1550/pp_photo.jpg");

print_r($image);