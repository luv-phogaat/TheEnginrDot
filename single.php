<!DOCTYPE html>
<html>
<head>
<title>Single | The Enginr Dot</title>
<!-- for-mobile-apps -->
<link rel="shortcut icon" type="image/x-icon" href="images/logotab.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- single -->
<script src="js/imagezoom.js"></script>
<script src="js/jquery.flexslider.js"></script>
<!-- single -->
<!-- cart -->
	<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="js/jquery.easing.min.js"></script>
</head>
<body>
<!-- header -->
<?php include('menu.php') ?>
<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Single</h3>
	</div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
<?php
    include_once('connect.php');
        $productid = $_GET['pid'];
//        echo $productid;
		   
			
			$run_products = mysqli_query($con, "select * from products where product_id = '".$productid."' ");
	
            $row_products = mysqli_fetch_array($run_products);
    
			$pro_id = $row_products['product_id']; 
			$pro_title = $row_products['product_title'];
			$pro_cat = $row_products['cat_id'];
			$pro_brand = $row_products['brand_id'];
			$pro_desc = $row_products['product_desc'];
			$pro_price = $row_products['product_price'];
			$pro_image = "admin_area/product_images/".$row_products['product_img1'];
            $pro_image02 = $row_products['product_img2'];
            $pro_image03 = $row_products['product_img3'];
//            echo $pro_image02;
            if($pro_image02)
                $pro_image2 = "admin_area/product_images/".$pro_image02;
            else
                $pro_image2 = "admin_area/product_images/Null.jpg";
            if($pro_image03)
                $pro_image3 = "admin_area/product_images/".$pro_image03;
            else
                $pro_image3 = "admin_area/product_images/Null.jpg";

    
    ?>
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails",
                                    itemWidth : "100"
								});
							});
						</script>
					<!-- //FlexSlider-->
					<ul class="slides">
						<li data-thumb="<?php echo $pro_image ?>" >
							<div class="thumb-image">
							    <img src="<?php echo $pro_image ?>" data-imagezoom="true" class="img-responsive"> 
				            </div>
						</li>
						<?php 
                            if(file_exists($pro_image2)){ 
                            echo '<li data-thumb="'.$pro_image2.'">
							<div class="thumb-image"> <img src="'.$pro_image2.'" data-imagezoom="true" class="img-responsive"> </div>
						</li>';
                        }
                            if(file_exists($pro_image3)){ 
                            echo '<li data-thumb="'.$pro_image3.'">
							<div class="thumb-image"> <img src="'.$pro_image3.'" data-imagezoom="true" class="img-responsive"> </div>
						</li>';
                        }
                        ?>
							
							
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
					<h3><?php echo $pro_title; ?></h3>
					<p><span class="item_price">&#8377; <?php echo $pro_price; ?></span> <del>&#8377; 900</del></p>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
<!--
					<div class="description">
						<h5>Check delivery, payment options and charges at your location</h5>
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}" required="">
						<input type="submit" value="Check">
					</div>
--><br>
					<div class="color-quality">
						<div class="color-quality-right">
							<h5>Quantity :</h5>
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="1">1 Qty</option>
								<option value="2">2 Qty</option>
								<option value="3">3 Qty</option>
								<option value="4">4 Qty</option>
								<option value="5">5 Qty</option>
								<option value="6">6 Qty</option>
								<option value="7">7 Qty</option> 
								<option value="8">8 Qty</option>					
								<option value="9">9 Qty</option>					
								<option value="10">10 Qty</option>								
							</select>
						</div>
					</div>
					<br>
					<div class="occasion-cart">
					<?php $pid = $_GET['pid']; ?>
						<a href="?pid=<?php echo $pid; ?>&add_cart=<?php echo $pid; ?>" class="item_add hvr-outline-out button2">Add to cart</a>
					</div>
					
		</div>
				<div class="clearfix"> </div>

				<div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>Product Brief Description</h5>
								<p>
								    <?php echo $pro_desc; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
	</div>
</div>
<!-- //single -->
<!-- //product-nav -->
<div class="coupons">
	<div class="container">
		<div class="coupons-grids text-center">
			<div class="col-md-3 coupons-gd">
				<h3>Buy your product in a simple way</h3>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<h4>LOGIN TO YOUR ACCOUNT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<h4>SELECT YOUR ITEM</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
				<h4>MAKE PAYMENT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- footer -->
<?php include('footer.php'); ?>
<!-- //footer -->
<!-- login -->
<!-- //login -->
</body>
</html>
<?php 
if(isset($_GET["add_cart"])){
//    echo "hello world";
    echo cart();
}
?>