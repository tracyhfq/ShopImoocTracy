<?php
function addAlbum($arr){
    $database = new Mysqli_Database();
    $res = $database->insert("imooc_album", $arr);
}