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
		<div class="m-titlebar">&nbsp&nbsp分类列表</div>
		<div class="m-table">
			<div class="tablewrap">

				<table>
				<tr>
				<th>分类名称</th>
				<td><input type="text"/></td>
				</tr>
<!-- 				<tr colnum="2"> <input type="button"/></tr> -->
				</table>
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