<?php
require_once 'string.func.php';
function verifyImage($type = 1, $length = 4, $pixel = 0, $line = 0, $ses_name = "verify"){
    session_start();
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
        $fontfile = "../fonts/".$fontfiles[mt_rand(0,count($fontfiles) - 1)];
        $text = substr($chars, $i,1);
//         echo "<br>".$size."<br>".$angle.$x.$y.$color.$fontfile.$text."<br>";
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
