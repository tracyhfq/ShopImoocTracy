<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';
$pageSize = 2;
$page= isset($_REQUEST['page'])?$_REQUEST['page']:1;
$sql="select * from imooc_admin";
$rows = getPageContent($pageSize,$page,$sql);
// alertMsg($rows,'');
// print_r($rows);
// $rows = getAllAdmin();
$pagehtml = showPage($page,getTotalPage($pageSize,$sql));
if (!$rows) {
    alertMsg("请添加管理员", 'adminAdd.php');
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
		<div class="m-titlebar">&nbsp&nbsp管理员列表</div>
		<div class="m-table">
			<div class="tablewrap">

				<table>
				<thead>
				<tr><th> 编号</th> <th>管理员名称</th><th>管理员邮箱</th><th>操作</th></tr>
				</thead>
				<tbody>
			<?php $i=1; foreach ($rows as $row) : ?>
				<tr>
				<td><?php echo $row['id']; ?> </td>
				<td><?php echo $row['username'] ;?> </td>
				<td><?php echo $row['email']; ?> </td>
				<td><a class="adminChange" href="adminAdd.php?id=<?php echo $row['id']; ?>">修改</a>
				 <a class="adminDelete" href="doAdminAction.php?act=adminDelete&id=<?php echo $row['id']; ?>">删除</a></td>
				</tr>
				<?php  $i++; endforeach;?>
				</tbody>
				
				</table>
				<div class="f-fr"><?php echo $pagehtml;?></div>
				
			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../JS/lib/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="../JS/lib/require.js" ></script>
<script type="text/javascript">
$('span.menuAdmin').html('-');
$('dl.menuAdmin').css('display','block');
</script>
</html>