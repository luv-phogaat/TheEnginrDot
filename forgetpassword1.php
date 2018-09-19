<?php
include('connect.php');
require('mail_setting.php');

$email = $_POST['email'];
$token =  strtoupper(uniqid(md5(rand(0,100000)+strtotime(date('curr_date')))));

$query1 = mysqli_query($con,"select * from customers where customer_email = '".$email."'");
if(mysqli_num_rows($query1) > 0){
$mail->setFrom('noreply@theenginrdot.in', 'The Enginr Dot');
$mail->addAddress($email);   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML
$mail->AddEmbeddedImage('images/logomaker.jpg', 'imglogo2'); 
$bodyContent = '<center><img src="cid:imglogo2" /></center>';
$bodyContent .= '<br>Hi '.$email.',<br>';
$bodyContent .= 'We\'ve received a request to reset your password. If you didn\'t make the request, just ignore <br>this email. Otherwise, you can reset your password using this link:';
$bodyContent .= '<a href="https://www.theenginrdot.in/newpassword?id='.$token.'&cid='.base64_encode($email).'">Click here</a>';
$mail->Subject = 'TheEnginrDot - Password Reset';
$mail->Body    = $bodyContent;
$query002 = mysqli_query($con,"update customers set token = '".$token."' where customer_email  = '".$email."'");

//echo $bodyContent;
if($query002 && $mail->send())
    ?>
    <script>alert('Check your mail!');window.location='index';</script>
<?php }
else{
    ?>
    <script>alert('Email id does not Exist');window.location='forgetpassword'</script>
    <?php    
}
//echo $bodyContent;

?>