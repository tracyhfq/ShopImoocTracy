<?php

function proAdd()
{
    $arr = $_POST;
    $arr['pubtime'] = time();
    $uploadFiles = uploadImg("uploads");
    if (!$uploadFiles) {
        return ;
    }
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
        
        alertMsg("添加成功", "../admin/proList.php");
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

function proDelete($id){
    if (!$id) {
        alertMsg("无法删除", "../admin/proList.php");
        return ;
    }
    
    $database = new Mysqli_Database;
    if ($database->delete("imooc_pro"," id=".$id)) {
        $proImgs = getAlbumById($id);
        if ($proImgs && is_array($proImgs)){
            foreach ($proImgs as $proImg) {
                unlink("../".$proImg['albumPath']);
            }
            
        }
        $database->delete("imooc_album", " pid = {$id}");
        alertMsg("删除成功", "../admin/proList.php");
    }
    
    
}

function proUpdate($id){
    $arr=$_POST;
    $arrv = array_values($arr);
    foreach ($arrv as $sim){
        if (!$sim){
            alertMsg("参数不能为空", "proAdd.php");
            return ;
        }
    }
    $database = new Mysqli_Database;
    if($database->update("imooc_pro",$arr," id = {$id}")){
        alertMsg("修改成功", '../admin/proList.php');
    }
}

function getOnePro($where){
    $sql="select * from imooc_pro". $where;
    $database = new Mysqli_Database;
    $rows = $database->fetchOne($sql);
    return $rows;
}

function getAllPro(){
    $sql="select * from imooc_pro";
    $database = new Mysqli_Database;
    $rows = $database->fetchAll($sql);
    return $rows;
}
