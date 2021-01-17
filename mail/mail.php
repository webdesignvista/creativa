<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require_once "validate.php";
require_once "mail.config.php";

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = $yourMailServerHostName; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
//$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = $yourMailServerUsername;
$mail->Password = $yourMailServerPassword;
$mail->setFrom( $fromEmail, $fromName );
$mail->addAddress( $toEmail, $toName );
$mail->Subject = $mailSubject;
$mail->msgHTML( $message ); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported';
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){    
    echo json_encode(['status' => 'error', 'errorMsg' => "Sorry could not send mail. Please contact admin."]);
}else{
    echo json_encode(['status' => 'success', 'message' => "Message sent. Thank you!"]);
}