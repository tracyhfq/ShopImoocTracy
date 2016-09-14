<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getOnePro(" where id = " . $id);
}

$albums = getAlbumById($id);
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
					<tbody>
						<tr>
							<th width="20%">商品编号</th>
							<td width="80%"><?php echo $row['id']?></td>
						</tr>
						<tr>
							<th>商品名称</th>
							<td><?php echo $row['pName']?></td>
						</tr>
						<tr>
							<th>商品分类</th>
							<td><?php echo $row['cId']?></td>
						</tr>
						<tr>
							<th>是否上架</th>
							<td><?php echo $row['isShow']?></td>
						</tr>
						<tr>
							<th>上架时间</th>
							<td><?php echo $row['pubTime']?></td>
						</tr>
						<tr>
							<th>商品优惠价</th>
							<td><?php echo $row['iPrice']?></td>
						</tr>
						<tr>
							<th>商品图片</th>
							<td><?php foreach ($albums as $album):?>
												<img width="100" height="100" alt=""
								src="../<?php echo $album['albumPath'];?>">
												
												<?php endforeach;?></td>
						</tr>
						<!-- 				<th>商品货号</th> -->
						<!-- 				<th>商品数量</th> -->
						<!-- 				<th>商品市场价</th> -->
						<!-- 				<th>商品描述</th> -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="../JS/lib/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="../JS/lib/require.js"></script>
<script type="text/javascript">
$('span.menuPro').html('-');
$('dl.menuPro').css('display','block');
</script>
</html>