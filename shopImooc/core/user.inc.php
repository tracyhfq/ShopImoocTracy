<?php
function userAdd() {
    $arr = $_POST;
    $arr['regTime'] = time();
    $uploadFiles = uploadImg("uploads");
    if (!$uploadFiles) {
        return ;
    }
//     alertMsg(print_r($uploadFiles), "");
//     ;
    $arr['face'] = $uploadFiles[0]['name'];
    $arrValues = array_values($arr);
    foreach ($arrValues as $value) {
        if($value =='') {
            alertMsg("参数为空，请重新填写", '../admin/userAdd.php');
            return;
        }
    }
    $arr['password'] =md5($arr['password']);
    $database = new Mysqli_Database;
    if($database->insert('imooc_user',$arr)){
        alertMsg("添加成功", '../admin/userList.php');
    }
}

function userDelete($id){
    if(!$id) {
        alertMsg("删除失败", '../admin/userList.php');
        return ;
    }
    $row = getOneUser(" where id = {$id}");
    $face = $row['face'];
    $database = new Mysqli_Database;
    if($database->delete("imooc_user "," id = {$id}")){
        unlink("../".$face);
        alertMsg("删除成功", '../admin/userList.php');
    }
}

function getAllUser($where=null){
    $sql="select * from imooc_user {$where}";
    $database = new Mysqli_Database;
    $rows = $database->fetchAll($sql);
    return $rows;

}

function getOneUser($where){
    $sql="select * from imooc_user". $where;
    $database = new Mysqli_Database;
    $rows = $database->fetchOne($sql);
    return $rows;
}

function userUpdate($id){
    $arr = $_POST;
    $uploadFiles = uploadImg("uploads");
    if (!$uploadFiles) {
        return ;
    }
    $arr['face'] = $uploadFiles[0]['name'];
    
    $arrValues = array_values($arr);
    foreach ($arrValues as $value) {
        if($value =='') {
            alertMsg("参数为空，请重新填写", '../admin/userAdd.php?id={$id}');
            return;
        }
    }
    $arr['password'] =md5($arr['password']);
    
    $oldrow = getOneUser(" where id = {$id}");
    $oldface = $oldrow['face'];
    
    $database = new Mysqli_Database;
    if($database->update("imooc_user",$arr," id = {$id}")){
        unlink("../".$oldface);
        alertMsg("修改成功", '../admin/userList.php');
    }
    else  {
        unlink("../".$arr['face']);
    }
}