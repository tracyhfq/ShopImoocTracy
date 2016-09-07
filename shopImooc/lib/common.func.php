<?php
function alertMsg($msg,$url){
    echo "<script>alert('{$msg}');</script>";
    if ($url){
    echo "<script>window.location='{$url}';</script>";
    }
}

function alertRefreshPart($msg,$html){
    echo "<script>alert('".$msg."dfdf"."');</script>";
    if ($html){
        echo $html;
    }
}