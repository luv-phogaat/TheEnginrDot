<?php
session_start();
if(!isset($_COOKIE['id'])){
setcookie("id", md5(time()), time() + (86400 * 90), "/");
$_COOKIE['id'] = md5(time());
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Index | The Enginr Dot</title>
<!-- for-mobile-apps -->
<link rel="shortcut icon" type="image/x-icon" href="images/logotab.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="The Enginr Dot Clothes Website, The Enginr Dot Responsive Website, The Enginr Dot Website, The Enginr Dot Android Compatible Website, 
Smartphone Compatible Website, Men's & Women's Wear Website" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- pignose css -->
<link href="css/pignose.layerslider.css" rel="stylesheet" type="text/css" media="all" />


<!-- //pignose css -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="js/jquery.easing.min.js"></script>
<!-- timer -->
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //timer -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<!-- Preloader -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> -->
	<!-- </script> -->
 <script> 
     jQuery(window).load(function(){ 
          jQuery(".hameid-loader-overlay").fadeOut(4000);  
    });  
  </script> 
<!-- //Preloader -->
</head>
<body>
<!-- Preloader -->
 <div class="hameid-loader-overlay"></div> 
<!-- //Preloader -->
<!-- header -->
<?php include('menu.php'); ?>
<!-- banner -->
<div class="banner-grid">
	<div id="visual">
			<div class="slide-visual animated wow zoomIn" data-wow-delay=".5s">
				<!-- Slide Image Area (1000 x 424) -->
				<ul class="slide-group">
					<li><img class="img-responsive" src="images/b1.jpeg" alt="Dummy Image" /></li>
					<li><img class="img-responsive" src="images/b2.jpeg" alt="Dummy Image" /></li>
					<li><img class="img-responsive" src="images/b3.jpeg" alt="Dummy Image" /></li>
				</ul>

				<!-- Slide Description Image Area (316 x 328) -->
				<div class="script-wrap">
					<ul class="script-group">
						<li><div class="inner-script"><img class="img-responsive" src="images/b11.jpeg" alt="Dummy Image" /></div></li>
						<li><div class="inner-script"><img class="img-responsive" src="images/b12.jpeg" alt="Dummy Image" /></div></li>
						<li><div class="inner-script"><img class="img-responsive" src="images/b13.jpeg" alt="Dummy Image" /></div></li>
					</ul>
					<div class="slide-controller">
						<a href="#" class="btn-prev"><img src="images/btn_prev.png" alt="Prev Slide" /></a>
						<a href="#" class="btn-play"><img src="images/btn_play.png" alt="Start Slide" /></a>
						<a href="#" class="btn-pause"><img src="images/btn_pause.png" alt="Pause Slide" /></a>
						<a href="#" class="btn-next"><img src="images/btn_next.png" alt="Next Slide" /></a>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	<script type="text/javascript" src="js/pignose.layerslider.js"></script>
	<script type="text/javascript">
	//<![CDATA[
		$(window).load(function() {
			$('#visual').pignoseLayerSlider({
				play    : '.btn-play',
				pause   : '.btn-pause',
				next    : '.btn-next',
				prev    : '.btn-prev'
			});
		});
	//]]>
	</script>

</div>
<!-- //banner -->
<!-- content -->

<div class="new_arrivals">
	<div class="container">
		<h3 class="animated wow zoomIn" data-wow-delay=".5s"><span>new </span>arrivals</h3>
<!--		<p class="animated wow slideInUp" data-wow-delay=".5s">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
		<div class="new_grids">
			<div class="col-md-4 new-gd-left animated wow slideInLeft" data-wow-delay=".5s">
				<img src="images/wed1.jpg" alt=" " />
				<div class="wed-brand simpleCart_shelfItem">
					<h4>Wedding Collections</h4>
					<h5>Flat 50% Discount</h5>
					<p><i>$250</i> <span class="item_price">$500</span><a class="item_add hvr-outline-out button2" href="#">add to cart </a></p>
				</div>
			</div>
			<div class="col-md-4 new-gd-middle">
				<div class="new-levis animated wow zoomIn" data-wow-delay=".5s">
					<div class="mid-img">
						<img src="images/levis1.png" alt=" " />
					</div>
					<div class="mid-text">
						<h4>up to 40% <span>off</span></h4>
						<a class="hvr-outline-out button2" href="product.php">Shop now </a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="new-levis animated wow zoomIn" data-wow-delay=".5s">
					<div class="mid-text">
						<h4>up to 50% <span>off</span></h4>
						<a class="hvr-outline-out button2" href="product.php">Shop now </a>
					</div>
					<div class="mid-img">
						<img src="images/dig.jpg" alt=" " />
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 new-gd-left animated wow slideInRight" data-wow-delay=".5s">
				<img src="images/wed2.jpg" alt=" " />
				<div class="wed-brandtwo simpleCart_shelfItem">
					<h4>Spring / Summer</h4>
					<p>Shop Men</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>-->
	</div>
</div>
<!-- //content -->

<!-- content-bottom -->

<div class="content-bottom">
	<div class="col-md-7 content-lgrid">
		<div class="col-sm-6 content-img-left text-center animated wow slideInLeft" data-wow-delay=".5s">
			<div class="content-grid-effect slow-zoom vertical">
				<div class="img-box"><img src="images/offer1.jpeg" alt="image" class="img-responsive zoom-img"></div>
					<div class="info-box">
						<div class="info-content simpleCart_shelfItem">
									<h4>T-Shirts</h4>
									<span class="separator"></span>
									<p><span class="item_price">₹ 399</span></p>
									<span class="separator"></span>
									<!--<a class="item_add hvr-outline-out button2" href="#">add to cart </a>-->
						</div>
					</div>
			</div>
		</div>
		<div class="col-sm-6 content-img-right animated wow zoomIn" data-wow-delay=".5s">
			<h3>Special Offers and <span>Discount On</span> T-Shirts</h3>
		</div>
		
		<div class="col-sm-6 content-img-right animated wow slideInLeft" data-wow-delay=".5s">
			<h3>Buy 3 get 1  free on <span> Branded</span> T-Shirts</h3>
		</div>
		<div class="col-sm-6 content-img-left text-center animated wow zoomIn" data-wow-delay=".5s">
			<div class="content-grid-effect slow-zoom vertical">
				<div class="img-box"><img src="images/offer2.jpeg" alt="image" class="img-responsive zoom-img"></div>
					<div class="info-box">
						<div class="info-content simpleCart_shelfItem">
							<h4>T-Shirts</h4>
							<span class="separator"></span>
							<p><span class="item_price">₹ 399</span></p>
							<span class="separator"></span>
							<!--<a class="item_add hvr-outline-out button2" href="#">add to cart </a>-->
						</div>
					</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="col-md-5 content-rgrid text-center animated wow slideInRight" data-wow-delay=".5s">
		<div class="content-grid-effect slow-zoom vertical">
				<div class="img-box"><img src="images/offer3.jpeg" alt="image" class="img-responsive zoom-img"></div>
					<div class="info-box">
						<div class="info-content simpleCart_shelfItem">
									<h4>T-Shirts</h4>
									<span class="separator"></span>
									<p><span class="item_price">₹ 399</span></p>
									<span class="separator"></span>
									<!--<a class="item_add hvr-outline-out button2" href="#">add to cart </a>-->
						</div>
					</div>
			</div>
	</div>
	<div class="clearfix"></div>
</div>
<!-- //content-bottom -->
<!-- product-nav -->

<div class="product-easy">
	<div class="container">
		
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
							
		</script>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Latest Designs</span></li> 
					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Special Offers</span></li> 
					<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Collections</span></li> 
				</ul>				  	 
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        <?php
                                getPro(); 

//                                getCatpro();
//
//                                getBrandPro();
                        
                        ?>
                    
						<div class="clearfix"></div>
					</div>
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
					        <?php
                                getPro(); 

//                                getCatpro();
//
//                                getBrandPro();
                        
                        ?>
                    
						<div class="clearfix"></div>
					
					</div>
					<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-2">
					        <?php
                                getPro(); 

//                                getCatpro();
//
//                                getBrandPro();
                        
                        ?>
                    
						<div class="clearfix"></div>
					<?php 
                        if(isset($_GET["add_cart"])){
        					echo cart();
                        }
                        ?>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- //product-nav -->

<div class="coupons">
	<div class="container">
		<div class="coupons-grids text-center">
			<div class="col-md-3 coupons-gd animated wow zoomIn" data-wow-delay=".5s">
				<h3>Buy your product in a simple way</h3>
			</div>
			<div class="col-md-3 coupons-gd animated wow zoomIn" data-wow-delay=".5s">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<h4>LOGIN TO YOUR ACCOUNT</h4>
				<!--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>-->
			</div>
			<div class="col-md-3 coupons-gd animated wow zoomIn" data-wow-delay=".5s">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<h4>SELECT YOUR ITEM</h4>
				<!--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>-->
			</div>
			<div class="col-md-3 coupons-gd animated wow zoomIn" data-wow-delay=".5s">
				<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
				<h4>MAKE PAYMENT</h4>
				<!--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>-->
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
