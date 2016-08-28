<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';
$rows = getAllAdmin();
if (!$rows) {
    alertMsg("请添加管理员", 'adminAdd.php');
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
				<td><input type="button" value="修改"/> <input type="button" value="删除"/></td>
				</tr>
				<?php  $i++; endforeach;?>
				</tbody>
				
<!-- 				<tr colnum="2"> <input type="button"/></tr> -->
				</table>
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