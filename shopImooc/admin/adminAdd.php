<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';
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
		<div class="m-titlebar">&nbsp&nbsp添加管理员</div>
		<div class="m-table">
			<div class="tablewrap">
			<form action="doAdminAction.php?act=adminAdd" method="post">
			<table>
				<tr>
				<th>管理员名称</th>
				<td><input type="text" name="username" placeholder="请输入管理员名称"/></td>
				</tr>
				<tr>
				<th>管理员密码</th>
				<td><input type="text" name="password" placeholder="请输入管理员密码"/></td>
				</tr>
				<tr>
				<th>管理员邮箱</th>
				<td><input type="text" name="email" placeholder="请输入管理员邮箱"/></td>
				</tr>
				
				<tr >
				<td colspan="2"><input type="submit" value="添加管理员"/></td>
				 </tr>
				</table>
				</form>

				
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