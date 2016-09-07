<?php
header("Content-type: text/html;charset=utf-8");

require_once '../include.php';
$act = $_REQUEST['act'];

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
if ($act == "logput") {
    logout();
} else 
    if ($act == 'adminAdd') {
        adminAdd();
    } else 
        if ($act == 'adminUpdate') {
            adminUpdate($id);
        } else 
            if ($act == 'adminDelete') {
                adminDelete($id);
            } else 
                if ($act == 'cateAdd') {
                    cateAdd();
                } else 
                    if ($act == "cateUpdate") {
                        cateUpdate($id);
                    } else 
                        if ($act == "cateDelete") {
                            cateDelete($id);
                        } 

                        else 
                            if ($act == "uploadImg") {
                                // print_r($_FILES);
                                
                                $filename = $_FILES['singleImg']['name'];
                                $type = $_FILES['singleImg']['type'];
                                $tmp_name = $_FILES['singleImg']['tmp_name'];
                                $error = $_FILES['singleImg']['error'];
                                $size = $_FILES['singleImg']['size'];
                                
                                if ($error == UPLOAD_ERR_OK) {
                                    if (is_uploaded_file($tmp_name)){
                                        $destination="../uploads/".$filename;
                                        if (move_uploaded_file($tmp_name, $destination)){
                                            alertMsg("上传成功", '');
                                            return ;
                                        }
                                    }
                                    else  {
                                        $msg="上传方式不是http post";
                                    }
                                } else {
                                    switch ($error) {
                                        case 1:
                                            $msg = "超过配置文件允许大小"; // php.ini uploads 可设置
                                            break;
                                        case 2:
                                            $msg = "超过表单允许大小"; //客户端配置<input type="hidden"  name="MAX_FILE_SIZE" value="1024
                                            break;
                                        case 3:
                                            $msg = "文件部分未上传";
                                            break;
                                        case 4:
                                            $msg = "无文件";
                                            break;
                                        case 6:
                                            $msg = "没有临时目录";
                                            break;
                                        case 7:
                                            $msg = "文件不可写";
                                            break;
                                        case 8:
                                            $msg = "扩展程序中断了文件上传";
                                            break;
                                        default:
                                            ;
                                            break;
                                    }
                                    alertMsg($msg, "");
                                }
                            }