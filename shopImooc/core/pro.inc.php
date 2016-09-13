<?php

function proAdd()
{
    $arr = $_POST;
    print_r($arr);
    $arr['pubtime'] = time();
    $uploadFiles = uploadImg("uploads");
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
            getResizedImg($uploadFile['name'], 50);
            getResizedImg($uploadFile['name'], 220);
            getResizedImg($uploadFile['name'], 350);
        }
    }
    
    $database = new Mysqli_Database();
    $pid = $database->insert("imooc_pro", $arr);
    if ($pid) {
        foreach ($uploadFiles as $uploadFile) {
            $arrimg['pid'] = $pid;
            $arrimg['albumPath'] = $uploadFile['name'];
            addAlbum($arrimg);
        }
        
        alertMsg("添加成功", "proList.php");
    } else {
        $dirpath = realpath(dirname(getcwd()));
        
        foreach ($uploadFiles as $uploadFile) {
            unlink($dirpath . "/" . $uploadFile['name']);
            
            $dstpath = $dirpath . dirname($uploadFile['name']);
            $dstfile = basename($uploadFile['name']);
            
            unlink($dstpath . "/image_50/" . $dstfile);
            unlink($dstpath . "/image_220/" . $dstfile);
            unlink($dstpath . "/image_350/" . $dstfile);
        }
        // unlink($dirpath."/".$filename);
    }
}