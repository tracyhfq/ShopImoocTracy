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
                        } else 
                            if ($act == "uploadImg") {
                                uploadImg($_FILES);
                            } 
//                             else 
//                                 if ($act == "uploadMultiImg") {
//                                     uploadImg($_FILES);
//                                 }
                            else if ($act=="proAdd"){
                                proAdd();
                            }