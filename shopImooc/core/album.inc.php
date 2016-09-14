<?php
function addAlbum($arr){
    $database = new Mysqli_Database();
    $res = $database->insert("imooc_album", $arr);
}

function getAlbumById($id){
    $database = new Mysqli_Database();
    $res = $database->fetchAll("select * from imooc_album where pid = {$id}");
    return $res;
}