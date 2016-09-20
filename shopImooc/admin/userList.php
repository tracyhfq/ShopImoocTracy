<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';
$pageSize = 2;
$page= isset($_REQUEST['page'])?$_REQUEST['page']:1;
$sql="select * from imooc_user";
$rows = getPageContent($pageSize,$page,$sql);
// alertMsg($rows,'');
// print_r($rows);
// $rows = getAllAdmin();
$pagehtml = showPage($page,getTotalPage($pageSize,$sql));
if (!$rows) {
    alertMsg("请添加用户", 'userAdd.php');
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
		<div class="m-titlebar">&nbsp&nbsp用户列表</div>
		<div class="m-table">
			<div class="tablewrap">

				<table>
				<thead>
				<tr><th> 编号</th> <th>用户名称</th><th>性别</th><th>注册时间<th>头像</th><th>操作</th></tr>
				</thead>
				<tbody>
			<?php $i=1; foreach ($rows as $row) : ?>
				<tr>
				<td><?php echo $row['id']; ?> </td>
				<td><?php echo $row['username'] ;?> </td>
								<td><?php echo $row['sex'] ;?> </td>
												<td><?php echo $row['regTime']; ?> </td>
								
								<td><img width="100" height="100" alt="" src="../<?php echo $row['face'] ;?>">  </td>
				
				<td><a class="userChange" href="userAdd.php?id=<?php echo $row['id']; ?>">修改</a>
				 <a class="userDelete" href="doAdminAction.php?act=userDelete&id=<?php echo $row['id']; ?>">删除</a></td>
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
$('span.menuUser').html('-');
$('dl.menuUser').css('display','block');
</script>
</html>