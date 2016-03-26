<?php
error_reporting (E_ALL & ~E_NOTICE);
require './class.phpmailer.php';
require './PHPMailerAutoload.php';
	$id		= $_POST['id'];
	$email 	= $_POST['email'];
	$name 	= $_POST['name'];
	$number 	= $_POST['number'];
	$sex		= $_POST['sex'];
	$sc 	= $_POST['sc'];
	$phone 	= $_POST['phone'];
	$grade 	= $_POST['grade'];
	echo $email;

	$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.shanghaitech.edu.cn';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'luoochq@shanghaitech.edu.cn';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->Port = 587;                                    // TCP port to connect to
$mail->CharSet  = "UTF-8";
$mail->setFrom('luoochq@shanghaitech.edu.cn', '16上海科技大学羽毛球比赛');
$mail->addAddress($email, $name);    
$mail->addReplyTo('luoochq@shanghaitech.edu.cn', '16上海科技大学羽毛球比赛');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = '确认：你已经成功报名了2016上海科技大学羽毛球羽毛球比赛!';
$mail->Body    = '<h1>亲爱的'.$name.'</h1><br />你已成功报名了2016上海科技大学校内羽毛球赛活动，感谢您的参与！以下为您的报名信息:
<br />您的参赛队名编号为：'.$id.'<br />姓名：'.$name.'<br />学号：'.$number.
'<br />学院：'.$sc.'<br />性别：'.$sex.'<br />年级：'.$grade.'<br />手机：'.$phone.'<br />Email：'
.$email.'<p style="text-align: right;"><strong>上海科技大学</strong></p>
<p style="text-align: right;"><strong>文艺体育部</strong></p>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>