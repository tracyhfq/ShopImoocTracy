<?php
function checkAdmin($sql){
	$database = new Mysqli_Database;
    return $database->fetchOne($sql);
}

function  checkLogined(){
    if($_SESSION['adminId']=="" && $_COOKIE['adminId']==""){
        alertMsg("请先登录", "login.php");
    }
}
function  logout(){
    //要清除会话变量，将$_SESSION超级全局变量设置为一个空数组
    $_SESSION=array();
    //清除cookies
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if (isset($_COOKIE['adminId'])){
        setcookie('adminId',"",time()-1);
    }
    if (isset($_COOKIE['adminName'])){
        setcookie('adminName',"",time()-1);
    }
    session_destroy();
    header("location:login.php");
}

function adminAdd() {
    $arr = $_POST;
    $arrValues = array_values($arr);
    foreach ($arrValues as $value) {
        if($value =='') {
            alertMsg("参数为空，请重新填写", '../admin/adminAdd.php');
            return;
        }
    }  
    $arr['password'] =md5($arr['password']);
    $database = new Mysqli_Database;
    if($database->insert('imooc_admin',$arr)){
        alertMsg("添加成功", '../admin/adminList.php');
    }
}

function adminDelete($id){
    if(!$id) {
        alertMsg("删除失败", '../admin/adminList.php');
        return ;
    }
    $database = new Mysqli_Database;
    if($database->delete("imooc_admin "," id = {$id}")){
        alertMsg("删除成功", '../admin/adminList.php');
    }
}

function getAllAdmin($where=null){    
    $sql="select * from imooc_admin {$where}";
    $database = new Mysqli_Database;
    $rows = $database->fetchAll($sql);
    return $rows;
    
}

function getOneAdmin($where){
    $sql="select * from imooc_admin". $where;
    $database = new Mysqli_Database;
    $rows = $database->fetchOne($sql);    
    return $rows;
}

function adminUpdate($id){
    $arr = $_POST;
    $arrValues = array_values($arr);
    foreach ($arrValues as $value) {
        if($value =='') {
            alertMsg("参数为空，请重新填写", '../admin/adminAdd.php');
            return;
        }
    }
    $arr['password'] =md5($arr['password']);
    $database = new Mysqli_Database;
    if($database->update("imooc_admin",$arr," id = {$id}")){
        alertMsg("修改成功", '../admin/adminList.php');
    }
}