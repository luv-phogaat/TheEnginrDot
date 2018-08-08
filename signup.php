<?php
session_start();
include("connect.php");
//$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = md5($_POST['c_pass']);
	
	$insert_customer = "insert into customers (customer_email, customer_pass ) 
	values ('$c_email','$c_pass')";
	$run_customer = mysqli_query($con, $insert_customer);
	if($run_customer){
        echo "<script>alert('Account Created!');window.location='index';</script>";   
        $_SESSION['email'] =$c_email;
    }
    else
    {
        echo "<script>alert('Error! Try after some time!');window.location='index';</script>";
    }
	
	
?>