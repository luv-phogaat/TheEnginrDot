<?php
//session_start();
include("includes/db.php");
include("functions/functions.php");
//echo session_id();
?>
<!--<div class="header">
	 <div class="container">
	 <ul>
 <li class="animated wow zoomIn" data-wow-delay=".5s"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
         <li class="animated wow zoomIn" data-wow-delay=".5s"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
		 <li class="animated wow zoomIn" data-wow-delay=".5s"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:theenginrdot@gmail.com">theenginrdot@gmail.com</a></li>
		 </ul>
	 </div>
</div>-->
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div  class="col-md-3 header-left animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
			<h1><a href="index"><img src="images/logomaker_new.png"></a></h1>
		</div>
		<div class="col-md-6 header-middle animated wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
			<form method="get" action="result?" style="padding-bottom:0px;">
				<div class="search">
					<input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="" name="searchname">
				</div>
				<div class="section_room">
					<select id="country" onchange="change_country(this.value)" class="frm-field required" name="data">
						<option value="all" selected>All categories</option>
						<option value="1">Mens</option>     
						<!--<option value="2">Womens</option>
                        <option value="AX">Watches</option>-->
					</select>
				</div>
				<div class="sear-sub" style="max-height:50px !important;">
					<input type="submit" value="">
				</div>
                <!--<div class="clearfix"></div>-->
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
			<ul>
				<?php
                    if(isset($_SESSION['email'])){ ?>
                        <li><a href="logout" class="use01"><span>Logout</span></a>
					
				</li>
                    <?php }
                else{?>
                      <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a></li>  
                <?php }
                ?>
                
				<li><a class="fb" href="#"></a></li>
				<li><a class="twi" href="#"></a></li>
				<li><a class="insta" href="#"></a></li>
				<li><a class="you" href="#"></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item "><a class="menu__link" href="index">Home <span class="sr-only">(current)</span></a></li>
					<li class="dropdown menu__item">
						<a href="mens" class="dropdown-toggle menu__link" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">men's t-shirts <!--<span class="caret"></span>--></a>
							<!--<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens"><img src="images/woo1.jpg" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="mens">Clothing</a></li>
											<li><a href="mens">Wallets</a></li>
											<li><a href="mens">Footwear</a></li>
											<li><a href="mens">Watches</a></li>
											<li><a href="mens">Accessories</a></li>
											<li><a href="mens">Bags</a></li>
											<li><a href="mens">Caps & Hats</a></li>
										</ul>									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="mens">Jewellery</a></li>
											<li><a href="mens">Sunglasses</a></li>
											<li><a href="mens">Perfumes</a></li>
											<li><a href="mens">Beauty</a></li>
											<li><a href="mens">Shirts</a></li>
											<li><a href="mens">Sunglasses</a></li>
											<li><a href="mens">Swimwear</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>-->
					</li>
				<!--	<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">women's wear <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="womens">Clothing</a></li>
											<li><a href="womens">Wallets</a></li>
											<li><a href="womens">Footwear</a></li>
											<li><a href="womens">Watches</a></li>
											<li><a href="womens">Accessories</a></li>
											<li><a href="womens">Bags</a></li>
											<li><a href="womens">Caps & Hats</a></li>
										</ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="womens">Jewellery</a></li>
											<li><a href="womens">Sunglasses</a></li>
											<li><a href="womens">Perfumes</a></li>
											<li><a href="womens">Beauty</a></li>
											<li><a href="womens">Shirts</a></li>
											<li><a href="womens">Sunglasses</a></li>
											<li><a href="womens">Swimwear</a></li>
										</ul>									</div>
									<div class="col-sm-6 multi-gd-img multi-gd-text ">
										<a href="womens"><img src="images/woo.jpg" alt=" "/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>-->
<!--
					<li class=" menu__item"><a class="menu__link" href="#">ACCESSORIES</a></li>
					<li class=" menu__item"><a class="menu__link" href="#">HEALTH CARE</a></li>
-->
					<li class=" menu__item"><a class="menu__link" href="contact">contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
						<a href="cart">
							<h3> <div class="total" id="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
								<span>&#8377; <?php  echo total_price(); ?></span> (<span><?php echo items(); ?></span> items)</div>
								
							</h3>
						</a>
    					<p><a href="index?empty=true" class="simpleCart_empty">Empty Cart</a></p>
						
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form method="post" action="signup.php">
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" placeholder="Type Here" required name="c_email">	
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" placeholder="Password" name="c_pass" required="">
												
											</div>
											<div class="sign-up">
												<h4>Re-type Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form method="post" action="auth.php">
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="" name="name">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="" name="password">
												<a href="forgetpassword">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
