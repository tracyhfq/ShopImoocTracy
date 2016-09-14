<?php

function proAdd()
{
    $arr = $_POST;
    $arr['pubtime'] = time();
    $uploadFiles = uploadImg("uploads");
    if (!$uploadFiles) {
        return ;
    }
    
    $database = new Mysqli_Database();
    $pid = $database->insert("imooc_pro", $arr);
    if ($pid) {
//         foreach ($uploadFiles as $uploadFile) {
//             $arrimg['pid'] = $pid;
//             $arrimg['albumPath'] = $uploadFile['name'];
//             addAlbum($arrimg);
//         }
        saveAndResize3imgs($uploadFiles,$pid);
        
        alertMsg("添加成功", "../admin/proList.php");
    } 
//     else {
//         delete3imgs($uploadFiles);
//     }
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
                $filen = basename($proImg['albumPath']);
                unlink("../image_50/".$filen);
                unlink("../image_220/".$filen);
                unlink("../image_350/".$filen);
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
            alertMsg("参数不能为空", "proAdd.php?id={$id}");
            return ;
        }
    }
    $uploadFiles = uploadImg("uploads");
    
    $database = new Mysqli_Database;
    $pid = $database->update("imooc_pro",$arr," id = {$id}");
    if($pid || $uploadFiles){
        
        alertMsg($pid, "");
        
        if (!$uploadFiles) {
            return ;
        }
        saveAndResize3imgs($uploadFiles,$id);
        
        alertMsg("修改成功", '../admin/proList.php');
    }  
    else {
        delete3imgs($uploadFiles);
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

function saveAndResize3imgs($uploadFiles,$pid){
    foreach ($uploadFiles as $uploadFile) {
        $arrimg['pid'] = $pid;
        $arrimg['albumPath'] = $uploadFile['name'];
        addAlbum($arrimg);
    }
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
             
            getResizedImg($uploadFile['name'], 50);
            getResizedImg($uploadFile['name'], 220);
            getResizedImg($uploadFile['name'], 350);
        }
    }
}

function delete3imgs($uploadFiles) {
$dirpath = realpath(dirname(getcwd()));
        
        foreach ($uploadFiles as $uploadFile) {
            unlink($dirpath . "/" . $uploadFile['name']);
            
            $dstfile = basename($uploadFile['name']);
            
            unlink($dirpath . "/image_50/" . $dstfile);
            unlink($dirpath . "/image_220/" . $dstfile);
            unlink($dirpath . "/image_350/" . $dstfile);
        }
}