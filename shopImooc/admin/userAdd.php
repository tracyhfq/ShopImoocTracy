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
    $row = getOneUser(" where id = {$id}");
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
		<div class="m-titlebar">&nbsp&nbsp<?php if (!$id) echo '添加用户'; else echo '修改用户' ?></div>
		<div class="m-table">
			<div class="tablewrap">
				<form
					action='doAdminAction.php?<?php if (!$id) echo "act=userAdd"; else echo "act=userUpdate&id={$id}"; ?> '
					method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<th>用户名称</th>
							<td><input type="text" name="username" placeholder="请输入用户名称"
								value="<?php if ($id)  echo $row['username'] ;?>" /></td>
						</tr>
						<tr>
							<th>用户密码</th>
							<td><input type="text" name="password" placeholder="请输入用户密码" /></td>
						</tr>
						<tr>
							<th>用户性别</th>
							<td><select name="sex">
							<option value="男">男</option>
							<option value="女">女</option>
							</select></td>
						</tr>
						<tr>
							<th>用户头像</th>
							<td><input type="file" name="face" placeholder="请上传头像" /></td>
						</tr>
						

						<tr>
							<td colspan="2"><input type="submit"
								value="<?php if (!$id) echo '添加用户'; else echo '修改用户' ?>" /></td>
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
$('span.menuUser').html('-');
$('dl.menuUser').css('display','block');
</script>
</html>