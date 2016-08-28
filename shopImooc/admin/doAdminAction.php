<?php
require_once '../include.php';
$act=$_REQUEST['act'];
if ($act == "logput"){
    logout();
}
else if($act == 'adminAdd') {
    adminAdd();
}