<?php
require_once 'string.func.php';
function verifyImage($type = 1, $length = 4, $pixel = 0, $line = 0, $ses_name = "verify"){
// $length = 4;
// $type = 1;
// $pixel = 1;
// $line = 1;
    $width = 100;
    $height = 30;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black  = imagecolorallocate($image, 0, 0, 0);
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    $chars = buildRandomString($type, $length);
    
    $_SESSION[$ses_name] = $chars;
    $fontfiles = array("SIMYOU.TTF");
    for ($i = 0; $i < $length; $i ++) {
        $size = mt_rand(14,17);
        $angle =mt_rand(-5,5);
        $x = 5 + $i*$size;
        $y = mt_rand(15,20);
        $color = imagecolorallocate($image, mt_rand(0,120), mt_rand(0,120), mt_rand(0,120));
        $fontfile = "../fonts/".$fontfiles[mt_rand(0,count($fontfiles) - 1)];       // "../fonts/SIMYOU.TTF";// 
        $text = substr($chars, $i,1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
        
    }
    
    $pixelcolor = imagecolorallocate($image, mt_rand(50,200), mt_rand(50,200), mt_rand(50,200));
    if ($pixel) {
        for ($i = 0; $i < $pixel; $i ++) {
            imagesetpixel($image, mt_rand(0,$width - 1), mt_rand(0,$height - 1), $pixelcolor);
        }
    }
    $linecolor = imagecolorallocate($image, mt_rand(80,200), mt_rand(80,200), mt_rand(80,200));
    if ($line) {
        for ($i = 0; $i < $line; $i ++) {
            imageline($image, mt_rand(0,$width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $linecolor);
        }
    }
    
    
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}

// verifyImage(2, 4, 20, 3,"verify");

/**
 *
 * @param unknown $filename
 *            带文件名
 * @param unknown $destination
 *            带文件名
 * @param unknown $dst_w
 * @param unknown $dst_h
 * @param unknown $isReserved
 * @return resource
 */
function thumb($filename = null, $destination = null, $dst_w = null, $dst_h = null, $isReserved = true, $scale = 0.5)
{
    if ($destination && ! file_exists(dirname($destination))) {
        mkdir(dirname($destination), 0777, true);
    }
    $dirpath = realpath(dirname(getcwd()));
    $dstFilename = $destination == null ? $dirpath . "/uploads/" . getUniName() . getExt($filename) : $destination;

    list ($src_w, $src_h, $imagetype) = getimagesize($filename);
    if (is_null($dst_w) || is_null($dst_h)) {
        $dst_w = $src_w * $scale;
        $dst_h = $dst_h * $scale;
    }

    $mime = image_type_to_mime_type($imagetype);
    $createFun = str_replace("/", "createfrom", $mime);
    $outFun = str_replace("/", null, $mime);

    $src_image = $createFun($filename); // imagecreatefromjpeg($filename);
    $dst_image = imagecreatetruecolor($dst_w, $dst_h);
    imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    $outFun($dst_image, $dstFilename);

    if (! $isReserved) {
        unlink($filename);
    }
    return $dstFilename;
}

function getResizedImg($imgname= "e9695a7d6051872966a290186656ab58.jpg",$size = 50){
    $dirpath = realpath(dirname(getcwd()));
    $filename = $dirpath.$imgname;
    
    $dstfile = basename($imgname);
    $dst1 = $dirpath."/image_".$size."/".$dstfile;   
    $dstFilename = thumb($filename, $dst1, $size, $size);
    return $dstFilename;   
}
