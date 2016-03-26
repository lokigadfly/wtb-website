<?php
function echoandexit($str){
	echo $str;
	$GLOBALS['DB']->CloseConnection();
	die();


}


	require "config.php";
	$email=$_POST["email"];
	$pass= $_POST["pass"];
	$count=count($DB->query("SELECT * FROM user WHERE email=? and pass=?",array($email,$pass)));
	if ($count==1){
		session_start();
		$_SESSION['username']=$email;
		echoandexit("success");

	}
	else {
		echoandexit("fail");

	}


?>