<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="../scripts/admin/side.css">
</head>
<body>
	<div class="sideframe">
		<div class="stitle">
			<p>管理员</p>
		</div>
		<ul>
			<li><a class="menu" id="menuPro" href="#"><span class="menuPro">+</span>商品管理</a>
				<dl class="menuPro" style="display:none">
					<dd>
						<a href="proAdd.php">添加商品</a>
					</dd>
					<dd>
						<a href="proList.php">商品列表</a>
					</dd>
				</dl></li>
			<li><a class="menu" id="menuCate" href="#"><span class="menuCate">+</span>分类管理</a>
				<dl class="menuCate" style="display:none">
					<dd>
						<a href="categoryAdd.php">添加分类</a>
					</dd>
					<dd>
						<a href="categoryList.php">分类列表</a>
					</dd>
				</dl></li>
			<li><a class="menu" id = "menuOrder" href="#"><span class="menuOrder">+</span>订单管理</a>
				<dl class="menuOrder" style="display:none">
					<dd>
						<a href="#">订单修改</a>
					</dd>
				</dl></li>
			<li><a class="menu" id ="menuUser" href="#"><span class="menuUser">+</span>用户管理</a>
				<dl class="menuUser" style="display:none">
					<dd>
						<a href="userAdd.php">添加用户</a>
					</dd>
					<dd>
						<a href="userList.php">用户列表</a>
					</dd>
				</dl></li>
			<li><a class="menu" id="menuAdmin" href="#"><span class="menuAdmin">+</span>管理员管理</a>
				<dl class="menuAdmin" style="display:none">
					<dd>
						<a href="adminAdd.php">添加管理员</a>
					</dd>
					<dd>
						<a href="adminList.php">管理员列表</a>
					</dd>
				</dl></li>
			<li><a class="menu" id="menuImg" href="#"><span class="menuImg">+</span>商品图片管理</a>
				<dl class="menuImg" style="display:none">
					<dd>
						<a href="#">商品拖列表</a>
					</dd>
				</dl></li>

		</ul>
	</div>

</body>
<script type="text/javascript" src="../JS/lib/require.js" data-main="../JS/admin/side"></script>
</html>
