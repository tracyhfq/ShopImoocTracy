<?php
require_once '../include.php';
checkLogined();
include 'top.php';
include 'side.php';
$rowscate = getAllcate();
if (!$rowscate) {
    alertMsg(@"请添加分类", "categoryAdd.php");
}
// print_r($rows);
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $rowpro = getOnePro(" where id = ".$id);
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
		<div class="m-titlebar">&nbsp&nbsp<?php if ($id) echo  "添加商品"; else  echo "编辑商品";?> </div>
		<div class="m-table">
			<div class="tablewrap">
                <form action= 'doAdminAction.php?<?php if (!$id) echo "act=proAdd"; else echo "act=proUpdate&id={$id}" ?>' method="post" enctype="multipart/form-data" onsubmit="return checkSubmit(this)" >
				<table>
				<tr>
				<th>商品名称</th>
				<td><input type="text" name="pName" value = "<?php if ($id) echo $rowpro['pName'] ?>"/></td>
				</tr>
				<tr>
				<th>商品分类</th>
				<td>
				<select name="cId">
				<?php foreach ($rowscate as $row):?>
				<option value='<?php echo $row['id'];?>' selected = ""><?php echo $row['cName'];?></option>
				<?php endforeach;?>
				</select>
				</td>
				</tr>
				<tr>
				<th>商品货号</th>
				<td><input type="text" name="pSn" value = "<?php if ($id) echo $rowpro['pSn'] ?>" /></td>
				</tr>
				<tr>
				<th>商品数量</th>
				<td><input type="text" name="pNum" value="<?php if ($id) echo $rowpro['pNum'] ?>" /></td>
				</tr>
				<tr>
				<th>商品市场价</th>
				<td><input type="text" name="mPrice" value="<?php if ($id) echo $rowpro['mPrice'] ?>" /></td>
				</tr>
				<tr>
				<th>商品优惠价</th>
				<td><input type="text" name="iPrice" value="<?php if ($id) echo $rowpro['iPrice'] ?>" /></td>
				</tr>
				<tr>
				<th>商品描述</th>
				<td><input type="text" name="pDesc" value="<?php if ($id) echo $rowpro['pDesc'] ?>" /></td>
				</tr>
<!-- 				<tr><th>商品图片</th> <td>  -->
<!-- 				<form action="doAdminAction.php?act=uploadImg" method="post" enctype="multipart/form-data">请选择上传文件 -->
<!-- 				<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/> -->
<!-- 				<input type="file" name="uploadImg" accept="image/jpeg,image/jpg,image/png"/> -->
<!-- 				<input type="submit" value="上传" /> -->
<!-- 				</form> -->
<!-- 				</td></tr> -->
				
				<tr><th>商品各尺寸图片</th> <td> 
				请选择上传文件
<!-- 				<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/> -->
<!-- 				<input type="file" name="multiImg" /> -->
<!-- 				<input type="file" name="multiImg[]" /> -->
				<input type="file" name="uploadImg[]" />
				<input type="file" name="uploadImg[]" />
<!-- 				<input type="submit" value="上传多张" /> -->
				</td></tr>
				
				<tr >
				<td colspan="2"><input type="submit" value=" <?php if ($id) echo "添加"; else echo "修改";?> "/></td>
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
$('span.menuPro').html('-');
$('dl.menuPro').css('display','block');
function checkSubmit(obj) {
	if(obj.pName.value == ""||obj.cId.value ==""||obj.pSn.value=="")
	return false;
	else 
		return true;
}
</script>
</html>