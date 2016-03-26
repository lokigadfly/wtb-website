<html>
<head>
	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<title>报名!</title>
</head>
<body>
  <?php 
mysql_query("set names utf8");
 ?>
	<div align="center">
		<h2 class="form-signin-heading">文体部报名</h2>
<input id="id"   style="width:200px;" placeholder="id" class="form-control">
<input id="name"  style="width:200px;" placeholder="name" class="form-control">
<input id="number" style="width:200px;"placeholder="number" class="form-control">
<input id="sex"  style="width:200px;" placeholder="sex" class="form-control">
<input id="sc"  style="width:200px;" placeholder="学院" class="form-control">
<input id="email"  style="width:200px;" placeholder="Email address" class="form-control">
<input id="phone"  style="width:200px;" placeholder="phone" class="form-control">
<br />
<button type="button" style="width:150px;" class="btn btn-lg btn-primary btn-block" onclick="submit_new();">报名</button>
</div>

<script type="text/javascript">
function submit_new(){
	alert("报名成功！");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "user_manipulate.php", false);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var id   = document.getElementById("id").value;
  var name    = document.getElementById("name").value;
  var number  = document.getElementById("number").value;
  var sex= document.getElementById("sex").value;
  var sc    = document.getElementById("sc").value;
  var email    = document.getElementById("email").value;
  var phone    = document.getElementById("phone").value;
  xmlhttp.send("action=new_row&id=" + id + "&name=" + name+ "&number=" + number+ "&sex=" + sex+ "&sc=" + sc +"&email=" + email +"&phone=" + phone);
}

</script>
</body>
</html>