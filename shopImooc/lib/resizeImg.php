<?php
$dirpath = realpath(dirname(getcwd()));
$path = $dirpath."/uploads/";
$filename=$path."e9695a7d6051872966a290186656ab58.jpg";

$src_image = imagecreatefromjpeg($filename);
list($src_w,$src_h)=getimagesize($filename);
$scale = 0.5;
$dst_w = ceil($src_w * $scale);
$dst_h = ceil($src_h * $scale);
$dst_image=imagecreatetruecolor($dst_w, $dst_h);
imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
header("content-type:image/jpeg");
imagejpeg($dst_image);
imagedestroy($dst_image);
imagedestroy($dst_image);