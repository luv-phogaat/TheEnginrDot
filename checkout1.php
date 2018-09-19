 <?php

 session_start();
 
include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<title>My Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>
<body>


	<!-- Main Wrapper or Container Starts-->
	
	
	<div class="main_wrapper">
	
	
	<!-- Header Starts-->
	
		<div class="header_wrapper">
		<a href="index.php"><img src="images/logo.jpg" style="float:left;"></a>
		<img src="images/banner.jpg" style="float:right;">
		</div>		
		<!-- Header ends-->		
		
		<!-- navigation Bar starts-->
		
		<div id="navbar">
		
			<ul id="menu">
				<li><a href="index.php">Home</a></li> 
				<li><a href="all_products.php">All Products</a></li> 
				<li><a href="my_account.php">My Account</a></li> 
				<li><a href="user_register.php">Sign Up</a></li> 
				<li><a href="cart.php">Shopping Cart</a></li> 
				<li><a href="contact.php">Contact Us</a></li> 
			
			</ul>
			<div id="form">
			<form method="get" action="results.php" enctype="mutipart/form-data">
			
			<input type="text" name="user_query" placeholder="Search a Product"/>
			<input type="submit" name="search" value="Search"/>
			
			</form>
			</div>
			
			
		</div>
		
		<!-- navigation Bar ends-->
		
		
		<div class="content_wrapper">
		
			<div id="left_sidebar">
			
			<div id="sidebar_title">Categories</div>
			
			<ul id="cats">
			
			<?php getCats(); ?>
			
			</ul>
			
			<div id="sidebar_title">Brands</div>
			
			<ul id="cats">
			
			
			<?php getBrands(); ?>
			
			</ul>
			
			</div>
			
			
			<div id="right_content">
			
			<?php cart(); ?>
			
			<div id="headline">
			
			<div id="headline_content">
			
			<?php
			
			if(!isset($_SESSION['customer_email'])){
				
				echo "<b>Welcome Guest!</b> <b style='color:yellow;'>Shopping Cart</b>";
				
			}
			
			else {
				
				echo "<b>Welcome:" . "<span style='color:skyblue;'>" . $_SESSION['customer_email'] . "</span>". "</b>" . "<b style='color:yellow;'>Your Shopping Cart</b>";
				
				
			}
			
			?>
			<span>- Total Items: <?php items(); ?> - Total Price: <?php total_price(); ?> - <a href="cart.php" style="color:#FF0;">Go to Cart</a>
			
			
			<?php
			
			if(!isset($_SESSION['customer_email'])){
			
			
			
			
			echo "<a href='checkout.php' style='color:#F93;'>Login</a>";
			
			
			
	 		}
			
			else {
				
				echo "<a href='logout.php' style='color:#F93;'>Logout</a>";
				
			}
			
			
			?>
			</span>
			
			
			</div>
			
			</div>
			
			
			
			
			
			<div>
			
			<?php 
			
			if(!isset($_SESSION['customer_email'])){
				
			include("customer/customer_login.php");	

			}
			
			
			else{
				
			include("payment_options.php");	
				
				
			}	
			

			?>
			
			</div>
			
			</div>
		
		
		
		</div>
		
		
		
		<div class="footer">
		
		<h1 style="color:#000; paddind-top: 30px; text-align: center;">&copy; March 2017 - By Garima Pandey</h1>
		
		</div>
	
	</div>

	<!-- Main Wrapper or Container ends -->

</body>
</html>