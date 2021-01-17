<?php

//**********************************//
$yourMailServerHostName = 'your mail server hostname'; // REQUIRED - typically something like mail.yourserverdomain.com
$yourMailServerUsername = 'your email account username'; // REQUIRED - your email account username
$yourMailServerPassword = 'your email account password'; // REQUIRED - your email account password
$fromEmail = $_POST['fromEmail']; // REQUIRED - this value is captured from the contact form automatically
$fromName = $_POST['fromName']; // REQUIRED - this value is captured from the contact form automatically
$message = $_POST['message']; // REQUIRED - this value is captured from the contact form automatically
$toEmail = 'recipient email'; // REQUIRED - the email id where the contact queries will be sent
$toName = 'recipient name'; // REQUIRED - the recipient id, it can be your / company name or name of you email support department
$mailSubject = 'Mail From My Site'; // REQUIRED - the subject matter of the email, change it to fit your own requirements
//**********************************//

$message = "Name: " . $_POST['fromName'] . "\n\r";
$message .= "Email: " . $_POST['fromEmail'] . "\n\r";
$message .= "Phone: " . $_POST['fromPhone'] . "\n\r";
$message .= "\n\r" . $message . "\n\r";