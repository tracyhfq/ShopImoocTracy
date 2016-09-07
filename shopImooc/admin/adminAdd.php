<?php
require_once '../include.php';
header("Content-type: text/html;charset=utf-8");

checkLogined();
include 'top.php';
include 'side.php';
$arr = $_GET;
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getOneAdmin(" where id = {$id}");
}
// alertMsg($row[username].$row[email], '');
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title>慕课网电子商务</title>
<link rel="stylesheet" type="text/css" href="../scripts/admin/index.css">
</head>
<body>
	<div class="subContent">
		<div class="m-titlebar">&nbsp&nbsp<?php if (!$id) echo '添加管理员'; else echo '修改管理员' ?></div>
		<div class="m-table">
			<div class="tablewrap">
				<form
					action='doAdminAction.php?<?php if (!$id) echo "act=adminAdd"; else echo "act=adminUpdate&id={$id}"; ?> '
					method="post">
					<table>
						<tr>
							<th>管理员名称</th>
							<td><input type="text" name="username" placeholder="请输入管理员名称"
								value="<?php if ($id)  echo $row['username'] ;?>" /></td>
						</tr>
						<tr>
							<th>管理员密码</th>
							<td><input type="text" name="password" placeholder="请输入管理员密码" /></td>
						</tr>
						<tr>
							<th>管理员邮箱</th>
							<td><input type="text" name="email" placeholder="请输入管理员邮箱"
								value="<?php if ($id) echo $row['email'] ; ?>" /></td>
						</tr>

						<tr>
							<td colspan="2"><input type="submit"
								value="<?php if (!$id) echo '添加管理员'; else echo '修改管理员' ?>" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../JS/lib/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="../JS/lib/require.js"></script>
<script type="text/javascript">
$('span.menuAdmin').html('-');
$('dl.menuAdmin').css('display','block');
</script>
</html>