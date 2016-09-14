<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';



$pageSize = 2;
$page= isset($_REQUEST['page'])?$_REQUEST['page']:1;
$sql="select * from imooc_pro";
$rows = getPageContent($pageSize,$page,$sql);

$pagehtml = showPage($page,getTotalPage($pageSize,$sql));
if (!$rows) {
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
			<div class="tablewrap">

				<table>
				<thead><tr>
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

				</tr></thead>
				<?php foreach ($rows as $row):?>
				<tr>
				<td><?php echo $row['id']?></td>
				<td><?php echo $row['pName']?></td>
				<td><?php echo $row['cId']?></td>
				<td><?php echo $row['isShow']?></td>
				<td><?php echo $row['pubTime']?></td>
				<td><?php echo $row['iPrice']?></td>
				<td>
				<a href="proDetail.php?id=<?php echo $row['id']?>">详情</a>
				<a href="proAdd.php?id=<?php echo $row['id']?>">修改</a>
				<a href="doAdminAction.php?act=proDelete&id=<?php echo $row['id']?>" >删除</a>
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
<script type="text/javascript" src="../JS/lib/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="../JS/lib/require.js" ></script>
<script type="text/javascript">
$('span.menuPro').html('-');
$('dl.menuPro').css('display','block');
</script>
</html>