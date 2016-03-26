<meta charset='utf-8'>
<?php
  require './config.php';
 $name = $_POST['name'];
 $gs = $_POST['gs'];
 $sc = $_POST['sc'];
 $total = $_POST['total'];
 $lev = $_POST['lev'];
 $des = $_POST['des'];
 $detail = $_POST['detail'];
 $category = $_POST['category'];
 $DB->query("INSERT INTO loc_to (name,gs,sc,total,lev,des,detail,category) VALUES (?,?,?,?,?,?,?,?)",array($name,$gs,$sc,$total,$lev,$des,$detail,$category));
 echo "添加成功";
 ?>