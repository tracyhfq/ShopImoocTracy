<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';
$order="";
$orderBy ="";
if (isset($_REQUEST['order'])){
    $order=$_REQUEST['order'];
    $orderBy = " order by ".$order;
    
}
// $order=$_REQUEST['order']?$_REQUEST['order']:null;
$keywords="";
$where = "";
if (isset($_REQUEST['keywords'])){
    $keywords = $_REQUEST['keywords'];
    $where = " where pName like '%{$keywords}%' ";
    
}
// $keywords = $_REQUEST['keywords'] ? $_REQUEST['keywords'] : null;
// $where = $keywords ? " where pName like '%{$keywords}%' " : null;

$pageSize = 2;
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
$sql = "select * from imooc_pro".$where.$orderBy;
// alertMsg($sql);
$rows = getPageContent($pageSize, $page, $sql);

$urlStr = ($keywords?"keywords={$keywords}":"").($keywords&&$order ?"&":"").($order?"order={$order}":"");
$pagehtml = showPage($page, getTotalPage($pageSize, $sql), $urlStr);
if (! $rows) {
    alertMsg("没有商品", 'proAdd.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>慕课网电子商务</title>
<link rel="stylesheet" type="text/css" href="../scripts/admin/index.css">
</head>
<body>
	<div class="subContent">
		<div class="m-titlebar">&nbsp&nbsp商品列表</div>
		<div class="m-table">
			<div class=" m-choosebar">

				<div class="f-fr m-search">
					<span>搜索&nbsp</span> <input type="text" placeholder="请输入商品名称"
						class="j-search" onkeypress="search()">
				</div>
				<div class="f-fr m-price"> <span>商品价格</span> 
					<select class="j-selectPrice" onchange="change(this.value)">
						<option value="iPrice asc">由低到高</option>
						<option value="iPrice desc" <?php if ($order=='iPrice desc') echo "selected='selected'"?>>由高到低</option>
					</select>
				</div>
				<div class="f-fr m-time"> <span>上架时间</span> 
					<select class="j-selectTime" onchange="change(this.value)">
						<option value="pubTime desc">最新发布</option>
						<option value="pubTime asc" <?php if ($order=='pubTime asc') echo "selected='selected'"?>>历史发布</option>
					</select>
				</div>

			</div>

			<div class="tablewrap">

				<table>
					<thead>
						<tr>
							<td>商品编号</td>
							<td>商品名称</td>
							<td>商品分类</td>
							<td>是否上架</td>
							<td>上架时间</td>
							<!-- 				<td>商品货号</td> -->
							<!-- 				<td>商品数量</td> -->
							<!-- 				<td>商品市场价</td> -->
							<td>商品优惠价</td>
							<!-- 				<td>商品描述</td> -->
							<td>操作</td>

						</tr>
					</thead>
				<?php foreach ($rows as $row):?>
				<tr>
						<td><?php echo $row['id']?></td>
						<td><?php echo $row['pName']?></td>
						<td><?php echo $row['cId']?></td>
						<td><?php echo $row['isShow']?></td>
						<td><?php echo $row['pubTime']?></td>
						<td><?php echo $row['iPrice']?></td>
						<td><a href="proDetail.php?id=<?php echo $row['id']?>">详情</a> <a
							href="proAdd.php?id=<?php echo $row['id']?>">修改</a> <a
							href="doAdminAction.php?act=proDelete&id=<?php echo $row['id']?>">删除</a>
						</td>
					</tr>
				<?php endforeach;?>
<!-- 				<tr colnum="2"> <input type="button"/></tr> -->
				</table>
				<div class="f-fr"><?php echo $pagehtml;?></div>

			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../JS/lib/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="../JS/lib/require.js"></script>
<script type="text/javascript">
$('span.menuPro').html('-');
$('dl.menuPro').css('display','block');


function search(){
    if (event.keyCode==13){
        var val=$('.j-search').val();
        window.location="proList.php?keywords="+val;
        
    }
}

function change(val){
// 	$ajax({
// 	});
	window.location = "proList.php?order="+val;
}
</script>
</html>