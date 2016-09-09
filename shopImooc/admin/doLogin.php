<?php
require_once '../include.php';
$username =$_POST['username'];
$password = md5($_POST['password']);
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
$autoFlag = $_POST['autoFlag'];
if (strtolower($verify)  == strtolower($verify1) ) {
    $sql = "select * from imooc_admin where username='{$username}' and password = '{$password}'";
    $res = checkAdmin($sql);
    if ($res){
        $_SESSION['adminName'] = $res['username'];
        $_SESSION['adminId'] = $res['id'];
        if($autoFlag){
//            setcookie("adminId",$res('id'), time()+7*24*3600);
//            setcookie("adminName",$res('username'), time() +7*24*3600);
        }
        header("location:index.php");
    }
    else {
        alertMsg("登陆失败", "login.php");
    }
//     echo "<script>alert('".$res['id'] ." ".$res['username']."');</script>";
//     print_r($res);

}
else {
    alertMsg("验证码错误，请重新登陆", "login.php");
}