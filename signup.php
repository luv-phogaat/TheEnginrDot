<?php
    session_start();
    if(isset($_COOKIE['id'])){
        $sessionid  = $_COOKIE['id'];
    }
    include("connect.php");
    //$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = md5($_POST['c_pass']);
    $checkquery = mysqli_query($con, "select * from customers where customer_email  = '".$c_email."'");
    if(mysqli_num_rows($checkquery) > 0){
        echo "<script>alert('Email Already Exists');window.location='index';</script>";
    }
    else{
        $run_customer1 = mysqli_query($con,"insert into customers(customer_email,customer_pass)values('".$c_email."','".$c_pass."')");
        if($run_customer1){
            $sqlquery0 = mysqli_query($con,"select * from cart where sessionid = '".$sessionid."' and emailid = 'Guest'");
            if(mysqli_num_rows($sqlquery0) > 0){
                $sqlquery1 = mysqli_query($con,"update cart set emailid = '".$c_email."' where sessionid  = '".$sessionid."' ");
            }
            echo "<script>alert('Account Created!');window.location='index';</script>";   
            $_SESSION['email'] = $c_email;
        }
        else
        {
            echo "<script>alert('Error! Try after some time!');window.location='index';</script>";
        }
    }
	
?>