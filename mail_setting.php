<?php
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.smtp.php';
require 'PHPMailer/class.phpmailer.php';

$mail = new PHPMailer(true);
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'server1.shinenode.com';                    // Specify main and backup SMTP servers
$mail->SMTPDebug = 3;
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'noreply@theenginrdot.in';          // SMTP username
$mail->Password = '}YC0X.)Q4ThC'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

?>