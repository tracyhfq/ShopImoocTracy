<?php
function alertMsg($msg,$url){
    echo "<script>alert('{$msg}');</script>";
    if ($url){
    echo "<script>window.location='{$url}';</script>";
    }
}