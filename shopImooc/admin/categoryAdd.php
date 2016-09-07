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
    $row = getOneCate(" where id = {$id}");
}
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
		<div class="m-titlebar">&nbsp&nbsp<?php if (!$id) echo '添加分类'; else echo '修改分类' ?></div>
		<div class="m-table">
			<div class="tablewrap">
			<form action="doAdminAction.php?<?php if (!$id) echo "act=cateAdd"; else echo "act=cateUpdate&id={$id}"; ?> " method="post">
			<table>
				<tr>
				<th>分类名称</th>
				<td><input type="text" name="cName" placeholder = "分类名称" value = '<?php if ($id) echo $row["cName"]; ?>'  /></td>
				</tr>
				<tr >
				<td colspan="2"><input type="submit" value="<?php if (!$id) echo '添加分类'; else echo '修改分类' ?>"/></td>
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
$('span.menuCate').html('-');
$('dl.menuCate').css('display','block');
</script>
</html>