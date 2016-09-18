<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';

$pageSize = 2;
$page= isset($_REQUEST['page'])?$_REQUEST['page']:1;
$sql="select * from imooc_cate order by id asc";
$rows = getPageContent($pageSize,$page,$sql);
// alertMsg($rows,'');
// print_r($rows);
// $rows = getAllAdmin();
$pagehtml = showPage($page,getTotalPage($pageSize,$sql));
if (!$rows) {
    alertMsg("请添加分类", 'categoryAdd.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>慕课网电子商务</title>
<link rel="stylesheet" type="text/css" href="../scripts/admin/admin.css">
</head>
<body>
	<div class="subContent">
		<div class="m-titlebar">&nbsp&nbsp分类列表</div>
		<div class="m-table">
			<div class="tablewrap">

				<table>
				<thead>
				<tr><td>分类编号</td><td>分类名称</td><td>操作</td></tr>
				</thead>
				<?php foreach ($rows as $row):?>
				<tr>
				
				<td><?php echo $row['id']?></td>
				<td><?php echo $row['cName']?></td>
				<td><a class="categoryChange" href="categoryAdd.php?id=<?php echo $row['id'];?>">修改</a>
				   <a href="doAdminAction.php?act=cateDelete&id=<?php echo $row['id'];?>">删除</a></td>
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
$('span.menuCate').html('-');
$('dl.menuCate').css('display','block');
</script>
</html>