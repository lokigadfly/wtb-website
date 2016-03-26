<html>
<head>
	<meta charset='utf-8'>
	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>删除完毕</title>
</head>
<body>
	<div class="container">
   <div class="row">
   	 <div class="col-md-12">
	<div class="alert alert-success">
<?php
require './config.php';
$shuzu=$_POST['bianhao'];
for ($i=0;$i<count($shuzu);$i++){
  	$id = (int) $shuzu[$i];
  	echo '编号';
  	echo $id+'<br />';
	$GLOBALS['DB']->query("DELETE FROM user_inf WHERE user_id=?",array($id));
  }
  echo "<h2>删除完毕!</h2>";
?>
</div>
<button type="button" class="btn btn-success" onclick="location='./admin_list_index.php'">返回管理界面</button>
</div>
</div>
</div>


</body>
</html>
