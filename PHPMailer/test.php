<?php
session_start();
require 'PHPMailerAutoload.php';
//require 'dbdb.php';
 

$mail = new PHPMailer;


$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = '';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '';                 // SMTP username
$mail->Password = '';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = '25';                                    // TCP port to connect to

$mail->setFrom('info@example.com', '验证码');
$mail->addAddress('info@example.com', 'Joe User');     // Add a recipient
$mail->addAddress('info@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('info@example.com');
$mail->addBCC('info@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body<b>FGSDFG</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}