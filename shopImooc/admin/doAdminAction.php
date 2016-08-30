<?php
require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if ($act == "logput"){
    logout();
}
else if($act == 'adminAdd') {
    adminAdd();
}
else if ($act == 'adminUpdate'){    
    adminUpdate($id);
    
}
else if($act == 'adminDelete') {
    adminDelete($id);
}