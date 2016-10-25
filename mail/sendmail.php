<?php
session_start();
require_once "email.class.php";
$ftoken = mt_rand(1000,9999);
$_SESSION['femail'] = $ftoken; 


	//******************** 配置信息 ********************************
	$smtpserver = $_GET['smtpserver'];//SMTP服务器
	$smtpserverport =$_GET['smtpserverport'];//SMTP服务器端口
	$smtpusermail = $_GET['smtpusermail'];//SMTP服务器的用户邮箱
	$smtpemailto =$_GET['smtpemailto'];//发送给谁
	$smtpuser = $_GET['smtpuser'];//SMTP服务器的用户帐号
	$smtppass = $_GET['smtppass'];//SMTP服务器的用户密码
	$mailtitle = "验证码";//邮件主题
	$mailcontent = "<h1>验证码：".$ftoken."</h1>";//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	echo "<div style='width:300px; margin:36px auto;'>";
	if($state==""){
		echo "--------------->send fail!";
		//echo "<a href='index.html'>return</a>";
		exit();
	}
	echo "----------->send success！";
	//echo "<a href='index.html'>点此返回</a>";
	echo "</div>";

?>