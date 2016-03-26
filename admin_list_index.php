<?php
  session_start();
  $user=@$_SESSION['username'];
  if ($user==null){
    header("location: ./login.html");
    die();
  }

?>
<html>
<head>
	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset='utf-8'>
	<title>管理员</title>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">文艺体育部</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">主页</a></li>
            <li><a href="./about.html">关于</a></li>
            <li><a href="./contact.html">联系我们</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./join_pub.html">报名！<span class="sr-only">(current)</span></a></li>
            <li ><a href="./wtb.html">主页</a></li>
            <li><a href="./index.html">后台登陆</a></li>
            <li><a href="./signout.php">logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>  
<form class="form-signin" method="POST" action="list_update.php">
<div class="table-responsive">
            <table class="table table-striped">
            <thead>
              <tr>
                <th>参赛队名</th>
                <th>姓名</th>
                <th>学号</th>
                <th>性别</th>
                <th>年级</th>
                <th>学院</th>
                <th>E-mail</th>
                <th>手机号</th>
                <th>选手ID</tr>

              </tr>
            </thead>
            <tbody id="table">
            </tbody>
          </table>
          </div>
<script type="text/javascript">
          ajax_get_table();
          function ajax_get_table(){
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            render_json(xmlhttp.responseText);
    }
  }
  xmlhttp.open("POST", "list_manipulate.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("action=show_table");
}
function render_json(response) {
    var arr = JSON.parse(response);
    var i;
    var out = "";

     for(i = 0; i < arr.length; i++) {
        out += "<tr><td>" +
        arr[i].id +
        "</td><td>" +
        arr[i].name +
        "</td><td>" +
        arr[i].number +
        "</td><td>"+
        arr[i].sex +
        "</td><td>"+
        arr[i].grade +
        "</td><td>"+
        arr[i].sc +
        "</td><td>"+
        arr[i].email +
        "</td><td>"+
        arr[i].phone +
        "</td><td>"+
        arr[i].user_id +
        "</td><td>"+
        '<input type="checkbox" name="bianhao[]" id="inlineCheckbox1" value="'+
        (arr[i].user_id) + '"></tr>'

    }
    document.getElementById("table").innerHTML = out;
}

          </script>
<button class="btn btn-lg btn-primary btn-block" name="button" type="submit" value="change">修改</button>
<button class="btn btn-lg btn-primary btn-block" name="button" type="submit" value="delete">删除</button>
      </form>
</body>
</html>
