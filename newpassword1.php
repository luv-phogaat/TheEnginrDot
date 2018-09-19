<?php
include('connect.php');
require('mail_setting.php');
if($_POST['newpass'] == $_POST['cnewpass']){
//$email = $_POST['email'];
$newpass = $_POST['newpass'];    
$email = base64_decode($_POST['email']);
$token = $_POST['token']; 
$query1 = mysqli_query($con,"select * from customers where customer_email = '".$email."' and token = '".$token."'");
if(mysqli_num_rows($query1) > 0){
$mail->setFrom('noreply@theenginrdot.in', 'The Enginr Dot');
$mail->addAddress($email);   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML
$mail->AddEmbeddedImage('images/logomaker.jpg', 'imglogo2'); 
$bodyContent = '<center><img src="cid:imglogo2" /></center>';
$bodyContent .= '<br>Hi '.$email.',<br>';
$bodyContent .= 'We\'ve received a request to reset your password. If you didn\'t make the request, kindly change your password.<br>';
$bodyContent .= 'Your Password has been changed successfully';
$mail->Subject = 'TheEnginrDot - Password Reset';
$mail->Body    = $bodyContent;
$query001 = mysqli_query($con,"update customers set token = '' where customer_email  = '".$email."'");
$query002 = mysqli_query($con,"update customers set customer_pass = '".md5($newpass)."' where customer_email  = '".$email."'");
//echo $bodyContent;
if($query001 && $query002 && $mail->send())
    echo "<script>alert('Password changed');window.location='index'</script>";
}
else{
    echo "<script>alert('Email id does not Exist');window.location='forgetpassword'</script>";
}
}
else{
    echo "<script>alert('Password do not match');window.history.go(-1);</script>";
}

?>