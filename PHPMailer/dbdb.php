<?php 
include("../config.php");
header("Content-Type: text/html; charset=utf-8");
$conn = @mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
@mysql_select_db(DB_DATABASE);
@mysql_query("set names 'utf8'");
/*
$mysqli = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mailServer=getSet('config_mail_protocol');
echo '$mailServer-------------->'.$mailServer.'<br>';

//$sql = "SELECT value FROM `oc_setting` WHERE setting_id = 285 or setting_id = 286 ";
//$sql = "SELECT * FROM `oc_setting` WHERE setting_id = 388";
$sql  = "SELECT * FROM `oc_setting` WHERE `key` = \"config_mail_smtp_hostname\"";
$sql1 = "SELECT * FROM `oc_setting` WHERE `key` = \"config_mail_smtp_username\"";
$sql2 = "SELECT * FROM `oc_setting` WHERE `key` = \"config_mail_smtp_password\"";
$sql3 = "SELECT * FROM `oc_setting` WHERE `key` = \"config_mail_smtp_port\"";
//$sql = "SELECT * FROM `oc_setting` ";

//echo $sql;

//$result = $mysqli->query($sql);
$result = $mysqli->query($sql1);
$row = $result->fetch_assoc();
var_dump($row);
echo $row["value"];

*/

	$smtpPort=getSet('config_mail_smtp_port');
    echo '$smtpPort-------------->'.$smtpPort.'<br>';

    //SMTP配置信息
    $smtpHostName=getSet('config_mail_smtp_hostname');
    echo '$smtpHostName-------------->'.$smtpHostName.'<br>';

    $smtpUserName=getSet('config_mail_smtp_username');
    echo '$smtpUserName-------------->'.$smtpUserName.'<br>';

    $smtpPassword=getSet('config_mail_smtp_password');
    echo '$smtpPassword-------------->'.$smtpPassword.'<br>';

    //网站邮箱
    $webMail=getSet('config_email');
     echo '$webMail-------------->'.$webMail.'<br>';

function getSet($str){//函数构建成功
    $result = mysql_query("select value from ".DB_PREFIX."setting where `key`='$str';");
    $row=mysql_fetch_array($result);
    return $row[0];
}
 




?>