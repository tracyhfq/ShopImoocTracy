<?php
require_once '../include.php';
$act=$_REQUEST['act'];

$id=isset($_REQUEST['id'])?$_REQUEST['id']:"";
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
else if($act == 'cateAdd'){
    cateAdd();
}
else if($act =="cateUpdate") {
    cateUpdate($id);
}
else if ($act == "cateDelete"){
    cateDelete($id);
}