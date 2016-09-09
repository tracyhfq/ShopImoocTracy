<?php

function cateAdd(){
    $arr = $_POST;
    $arrValues = array_values($arr);
//     alertMsg(print_r($arr), '');
    
    foreach ($arrValues as $value) {
        if($value =='') {
            alertMsg("参数为空，请重新填写", '../admin/adminAdd.php');
            return;
        }
    }
    $database = new Mysqli_Database;
    if($database->insert('imooc_cate',$arr)){
        alertMsg("添加成功", '../admin/categoryList.php');
    }
}

function getOneCate($where){
    $sql="select * from imooc_cate". $where;
    $database = new Mysqli_Database;
    $rows = $database->fetchOne($sql);
    return $rows;
}

function cateDelete($id){
    if(!$id) {
        alertMsg("删除失败", '../admin/cateList.php');
        return ;
    }
    $database = new Mysqli_Database;
    if($database->delete("imooc_cate "," id = {$id}")){
        alertMsg("删除成功", '../admin/cateList.php');
    }
}

function cateUpdate($id){
//     alertMsg(print_r($id),'');
    $arr = $_POST;
    $arrValues = array_values($arr);
    foreach ($arrValues as $value) {
        if($value =='') {
            alertMsg("参数为空，请重新填写", '../admin/categoryAdd.php?id='.$id);
            return;
        }
    }
    $database = new Mysqli_Database;
    if($database->update("imooc_cate",$arr," id = {$id}")){
        alertMsg("修改成功", '../admin/categoryList.php');
    }
}