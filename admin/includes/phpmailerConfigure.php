<?php
require __DIR__.'/../libs/phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;  // Enable verbose debug output

$mail->isSMTP();  // Set mailer to use SMTP
$mail->Host = Config::get('mail/host');  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;  // Enable SMTP authentication
$mail->Username = Config::get('mail/username'); // SMTP username
$mail->Password = Config::get('mail/password'); // SMTP password
$mail->SMTPSecure = Config::get('mail/protocol');  // Enable TLS encryption, `ssl` also accepted
$mail->Port = Config::get('mail/port'); // TCP port to connect to
$mail->setFrom('noreplyadmedia@gmail.com', 'AdMedia');
