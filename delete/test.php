<?php
/**
 * Created by PhpStorm.
 * User: Alien Shrestha
 * Date: 8/1/2017
 * Time: 5:59 PM
 */

require_once "third_party/image_resize/ImageResize.php";

//$image=new \Eventviva\ImageResize("user_uploads/1639/pp_photo.jpg");

use \Eventviva\ImageResizeAlt;

$image =new ImageResizeAlt();

////print_r($image);
//function resize_image($file, $w, $h, $crop=false) {
//	list($width, $height) = getimagesize($file);
//	$r = $width / $height;
//	if ($crop) {
//		if ($width > $height) {
//			$width = ceil($width-($width*abs($r-$w/$h)));
//		} else {
//			$height = ceil($height-($height*abs($r-$w/$h)));
//		}
//		$newwidth = $w;
//		$newheight = $h;
//	} else {
//		if ($w/$h > $r) {
//			$newwidth = $h*$r;
//			$newheight = $h;
//		} else {
//			$newheight = $w/$r;
//			$newwidth = $w;
//		}
//	}
//
//	//Get file extension
//	$exploding = explode(".",$file);
//	$ext = end($exploding);
//
//	switch($ext){
//		case "png":
//			$src = imagecreatefrompng($file);
//			break;
//		case "jpeg":
//		case "jpg":
//			$src = imagecreatefromjpeg($file);
//			break;
//		case "gif":
//			$src = imagecreatefromgif($file);
//			break;
//		default:
//			$src = imagecreatefromjpeg($file);
//			break;
//	}
//
//	$dst = imagecreatetruecolor($newwidth, $newheight);
//	imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//
//	return $dst;
//}


$filename = "user_uploads/1640/pp_photo.jpg";
$resizedFilename = "user_uploads/1640/pp_photo_45x35mm.jpg";

$image->ImageResize($filename, 128,99);
$image->Save($resizedFilename,-1);
