<?php
require_once '../lib/string.func.php';
header("Content-type: text/html;charset=utf-8");

function uploadImg($localpath)
{
    $files = buildInfo();
    $i = 0;
    foreach ($files as $file) {
        if (!$file['name']){
            return ;
        }
        $imgUrl = uploadFile($localpath, $file, $allowExt = array(
            "gif",
            "jpeg",
            "jpg",
            "png",
            "wbmp"
        ), $maxSize = 1048576, $imgFlag = true);
        $imgUrls[] = $imgUrl;
    }
    return $imgUrls;
}

function buildInfo()
{
    $fileinfo = $_FILES;
    if (! $fileinfo) {
        return;
    }
    $i = 0;
    foreach ($fileinfo as $v) {
        if (is_string($v['name'])) {
            $files[$i] = $v;
            $i ++;
        } else {
            foreach ($v['name'] as $key => $val) {
                $files[$i]['name'] = $val;
                $files[$i]['type'] = $v['type'][$key];
                $files[$i]['tmp_name'] = $v['tmp_name'][$key];
                $files[$i]['error'] = $v['error'][$key];
                $files[$i]['size'] = $v['size'][$key];
                $i ++;
            }
        }
    }
    return $files;
}

function uploadFile($localPath, $fileinfo, $allowExt, $maxSize, $imgFlag)
{
    $filename = $fileinfo['name'];
    $type = $fileinfo['type'];
    $tmp_name = $fileinfo['tmp_name'];
    $error = $fileinfo['error'];
    $size = $fileinfo['size'];
    
    if ($imgFlag) {
        // 验证图片为真正的图片类型
        $info = getimagesize($tmp_name);
        if (! $info) {
            $msg = "不是真正的图片类型";
            alertMsg($msg, "");
            return;
        }
    }
    if ($error == UPLOAD_ERR_OK) {
        $imgExt = getExt($filename);
        if (! in_array($imgExt, $allowExt)) {
            $msg = "图片格式不对";
            alertMsg($msg, "");
            return;
        }
        if ($size > $maxSize) {
            $msg = "图片尺寸过大";
            alertMsg($msg, "");
            return;
        }
        if (is_uploaded_file($tmp_name)) { // 是否通过http post 上传
            $dirpath = realpath(dirname(getcwd()));
            
            $path = $dirpath . "/" . $localPath;
            if (! file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $destination = getUniName() . "." . $imgExt;
            
            if (move_uploaded_file($tmp_name, $path . "/" . $destination)) {
                
                $fileinfo['name'] = "/" . $localPath . "/" . $destination;
                unset($fileinfo['tmp_name'], $fileinfo['size'], $fileinfo['type']);
                
                return $fileinfo;
            } else {
                alertMsg("移动文件出错", '');
            }
        } else {
            $msg = "上传方式不是http post";
        }
    } else {
        switch ($error) {
            case 1:
                $msg = "超过配置文件允许大小"; // php.ini uploads 可设置
                break;
            case 2:
                $msg = "超过表单允许大小"; // 客户端配置<input type="hidden" name="MAX_FILE_SIZE" value="1024
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