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
		<div class="m-titlebar">&nbsp&nbsp后台管理</div>
		<div class="m-table"> 
		<div  class="tablewrap">
			<h3>系统信息</h3>

			<table>
				<tr>
					<th width="25%">操作系统</th>
					<td width="75%"><?php echo PHP_OS;?></td>
				</tr>
				<tr>
					<th width="25%">Apache版本</th>
					<td width="75%"><?php echo apache_get_version();?></td>
				</tr>
				<tr>
					<th width="25%">PHP版本</th>
					<td width="75%"><?php echo PHP_VERSION;?></td>
				</tr>
				<tr>
					<th width="25%">运行方式</th>
					<td width="75%"><?php echo PHP_SAPI;?></td>
				</tr>
			</table>
		</div>

		<div class="tablewrap">
			<table>
				<h3>软件信息</h3>
				<tr>
					<th width="25%">系统名称</th>
					<td width="75%">yoyo 电子商务</td>
				</tr>
				<tr>
					<th width="25%">开发团队</th>
					<td width="75%">single</td>
				</tr>
				<tr>
					<th width="25%">公司网址</th>
					<td width="75%"><a href="www.baidu.com">www.baidu.com</a></td>
				</tr>
				<tr>
					<th width="25%">联系方式</th>
					<td width="75%">老和山下</td>
				</tr>
			</table>
		</div>
	</div>
	</div>
</body>
</html>