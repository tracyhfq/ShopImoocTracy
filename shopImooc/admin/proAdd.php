<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';
$rows = getAllcate();
if (!$rows) {
    alertMsg(@"请添加分类", "categoryAdd.php");
}
print_r($rows);
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
		<div class="m-titlebar">&nbsp&nbsp添加商品</div>
		<div class="m-table">
			<div class="tablewrap">

				<table>
				<tr>
				<th>商品名称</th>
				<td><input type="text"/></td>
				</tr>
				<tr>
				<th>商品分类</th>
				<td>
				<select name="cId">
				<?php foreach ($rows as $row):?>
				<option value='<?php echo $row['id'];?>' ><?php echo $row['cName'];?></option>
				<?php endforeach;?>
				</select>
				</td>
				</tr>
				<tr>
				<th>商品货号</th>
				<td><input type="text" name="pSn" value="" /></td>
				</tr>
				<tr>
				<th>商品数量</th>
				<td><input type="text" name="pSn" value="" /></td>
				</tr>
				<tr>
				<th>商品市场价</th>
				<td><input type="text" name="pSn" value="" /></td>
				</tr>
				<tr>
				<th>商品优惠价</th>
				<td><input type="text" name="pSn" value="" /></td>
				</tr>
				<tr>
				<th>商品描述</th>
				<td><input type="text" name="pSn" value="" /></td>
				</tr>
<!-- 				<tr><th>商品图片</th> <td>  -->
<!-- 				<form action="doAdminAction.php?act=uploadImg" method="post" enctype="multipart/form-data">请选择上传文件 -->
<!-- 				<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/> -->
<!-- 				<input type="file" name="uploadImg" accept="image/jpeg,image/jpg,image/png"/> -->
<!-- 				<input type="submit" value="上传" /> -->
<!-- 				</form> -->
<!-- 				</td></tr> -->
				
				<tr><th>商品各尺寸图片</th> <td> 
				<form action="doAdminAction.php?act=uploadMultiImg" method="post" enctype="multipart/form-data">请选择上传文件
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
<!-- 				<input type="file" name="multiImg" /> -->
<!-- 				<input type="file" name="multiImg[]" /> -->
				<input type="file" name="uploadImg[]" />
				<input type="file" name="uploadImg[]" />
				<input type="submit" value="上传多张" />
				</form>
				</td></tr>
				
				<tr >
				<td colspan="2"><input type="button" value="添加"/></td>
				 </tr>
				</table>
			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../JS/lib/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="../JS/lib/require.js" ></script>
<script type="text/javascript">
$('span.menuPro').html('-');
$('dl.menuPro').css('display','block');
</script>
</html>