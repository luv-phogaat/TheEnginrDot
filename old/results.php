 <?php

include("../includes/db.php");
include("../functions/functions.php");
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
			
			<div id="headline">
			
			<div id="headline_content">
			
			<b>Welcome Guest!</b>
			<b style="color:yellow;">Shopping Cart</b>
			<span>Items: - Price:</span>
			
			
			</div>
			
			</div>
			
			<div id="products_box">
			
			<?php 
			
			
			if(isset($_GET['search'])){
				
				$user_keyword = $_GET['user_query'];
			
			$get_products = "select * from products where product_keywords like '%$user_keyword%'";
			
			$run_products = mysqli_query($con, $get_products);
			
			while($row_products = mysqli_fetch_array($run_products)){
			
			$pro_id = $row_products['product_id']; 
			$pro_title = $row_products['product_title'];
			$pro_cat = $row_products['cat_id'];
			$pro_brand = $row_products['brand_id'];
			$pro_desc = $row_products['product_desc'];
			$pro_price = $row_products['product_price'];
			$pro_image = $row_products['product_img1'];
			
			echo "
			
			<div id= 'single_product'>
			
			<h3>$pro_title</h3>
			
			<img src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
			
			<p><b>Price: $ $pro_price</b></p>
			
			<a href='details.php?pro_id=$pro_id' style='float: left;'>Details</a>
			
			<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
			
			
			</div>
			
			";
			
			
			
			}
			
			
			
			
	
			}
	


			?>
			
			</div>
			
			</div>
		
		
		
		</div>
		
		
		
		<div class="footer">
		
<!--		<h1 style="color:#000; paddind-top: 30px; text-align: center;">&copy; March 2017 - By Garima Pandey</h1>-->
		
		</div>
	
	</div>

	<!-- Main Wrapper or Container ends -->

</body>
</html>