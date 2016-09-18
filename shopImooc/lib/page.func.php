<?php
// require_once '../include.php';

// function getNum ($pageSize = 2){
//     $pageSize = 2; //每页几项
//     // require_once '../include.php';
    
//     $page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
function getTotalPage($pageSize=1,$sql){
    $database = new Mysqli_Database;
    $totalRows = $database->getResultNum($sql);
    $totalPage = ceil($totalRows/$pageSize);
    return $totalPage;
}
function getPageContent($pageSize=1,$page=1,$sql){
    $database = new Mysqli_Database;
        $totalPage = getTotalPage($pageSize,$sql);
    
//         alertMsg($pageSize." ".$page." ".$totalPage." ".$sql, '');
        
    if($page<1 || $page == null || !is_numeric($page)){
        $page = 1;
    }
    if ($page >=$totalPage) {
        $page = $totalPage;
    }
    $offset=($page - 1) *$pageSize;
    $sql=$sql." limit {$offset},{$pageSize}";
    $rows = $database->fetchAll($sql);
    
    return  $rows;
}
  
//        print_r($rows);
    
       function showPage($page=1,$totalPage=1,$where=null){
           $where = $where==null?null:"&".$where;
           $database = new Mysqli_Database;
            
           $url = $_SERVER['PHP_SELF'];
           $first = ($page == 1?"首页":"<a href='{$url}?page=1{$where}'>首页</a>");
           $last = ($page == $totalPage?"尾页":"<a href='{$url}?page={$totalPage}{$where}'>尾页</a>");
           $prev = ($page <=1 ?"上一页":"<a href='{$url}?page=".($page-1)."{$where}'>上一页</a>");
           $next = ($page >= $totalPage?"下一页":"<a href='{$url}?page=".($page+1)."{$where}'>下一页</a>");
           $dic = "第".$page."/".$totalPage."页";
           $p=$first.$prev;
           for($i=1;$i<=$totalPage;$i++){
               if ($page == $i) {
                   $p.="[{$i}]";
               }
               else {
                   $p.="<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
               }
           }
           
           $p.= $next.$last." ".$dic;
//            echo '<br/>';
           return $p;
       }
       
   
// }
?>