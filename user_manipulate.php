<?php

require './config.php';

$action = @$_POST['action'];
/*
$id 	= @$_POST['id'];
$value 	= @$_POST['value'];
$new_email		= @$_POST['new_email'];
$new_pass 		= @$_POST['new_pass'];
$new_passwd 	= @$_POST['new_passwd'];
$new_port 		= @$_POST['new_port'];
$new_transfer 	= @$_POST['new_transfer'];
*/

if ($action=='show_table') 				show_table();
if ($action=='show_team') 				show_team();
if ($action=='delete_row') 				delete_row();
if ($action=='new_row')					new_row();
if ($action=='new_team')					new_team();
if (preg_match('/change/', $action)) 	change($action);


function show_table(){
	$data = $GLOBALS['DB']->query("SELECT * FROM user_inf");
	echo json_encode($data);
}
function show_team(){
	$data = $GLOBALS['DB']->query("SELECT * FROM user_team");
	echo json_encode($data);
}

function delete_row(){
	$id = (int) @$_POST['id'];
	$GLOBALS['DB']->query("DELETE FROM user WHERE id=?",array($id));
}

function change($action){
	$id = (int) @$_POST['id'];
	$value = @$_POST['value'];

	if ($action=='change_email') {
		$GLOBALS['DB']->query("UPDATE user SET email = ? WHERE id = ?",array($value,$id));
	}
	if ($action=='change_pass') {
		$GLOBALS['DB']->query("UPDATE user SET pass = ? WHERE id = ?",array($value,$id));
	}
	if ($action=='change_passwd') {
		$GLOBALS['DB']->query("UPDATE user SET passwd = ? WHERE id = ?",array($value,$id));
	}
	if ($action=='change_port') {
		$GLOBALS['DB']->query("UPDATE user SET port = ? WHERE id = ?",array($value,$id));
	}
	if ($action=='change_u') {
		$GLOBALS['DB']->query("UPDATE user SET u = ? WHERE id = ?",array(((int)$value)*1024*1024,$id));
	}
	if ($action=='change_d') {
		$GLOBALS['DB']->query("UPDATE user SET d = ? WHERE id = ?",array(((int)$value)*1024*1024,$id));
	}
	if ($action=='change_transfer') {
		$GLOBALS['DB']->query("UPDATE user SET transfer_enable = ? WHERE id = ?",array(((int)$value)*1024*1024,$id));
	}
	if ($action=='change_enable') {
		$GLOBALS['DB']->query("UPDATE user SET enable = ? WHERE id = ?",array($value,$id));
	}
}

function new_row(){
	$id		= @$_POST['id'];
	$name 		= @$_POST['name'];
	$number 	= @$_POST['number'];
	$sex		= @$_POST['sex'];
	$sc 	= @$_POST['sc'];
	$email 	= @$_POST['email'];
	$phone 	= @$_POST['phone'];
	$grade 	= @$_POST['grade'];
	$GLOBALS['DB']->query("INSERT INTO user_inf (id,name,number,sex,sc,email,phone,grade) VALUES (?,?,?,?,?,?,?,?)",array($id,$name,$number,$sex,$sc,$email,$phone,$grade));
}

function new_team(){
	$name 		= @$_POST['name'];
	$GLOBALS['DB']->query("INSERT INTO user_team (id,name,number,sex,sc,email,phone) VALUES ('0',?,'0','0','0','0','0')",array($name));
}


?>

