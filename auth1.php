<?php
session_start();
include('connect.php');
$sessionid = $_COOKIE['id'];
$id = $_POST['name'];
$password = $_POST['password'];
//echo $id;
$sqlquery = mysqli_query($con,"select * from customers where customer_email = '".$id."' and customer_pass = '".md5($password)."'");


if(mysqli_num_rows($sqlquery) > 0){
//    $id = mysqli_fetch_array($sqlquery);
    $_SESSION['email'] = $id;
//    $_SESSION['role'] = $id['role'];
//    echo $id['role'];
    $sqlquery0 = mysqli_query($con,"select * from cart where sessionid = '".$sessionid."' and emailid = 'Guest'");
    if(mysqli_num_rows($sqlquery0) > 0){
        $sqlquery1 = mysqli_query($con,"update cart set emailid = '".$id."' where sessionid  = '".$sessionid."' ");
    }
    echo "<script>alert('Welcome!');window.location='summary';</script>";
}
else{
    echo "<script>alert('Invalid credentials');window.location='summary';</script>";
}

?>