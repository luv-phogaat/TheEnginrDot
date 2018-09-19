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
<title>Summary | The Enginr Dot</title>
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
<style>
    .simpleCart_shelfItem{
        width: 25%;
        float:right;
    border: 1px solid #ccc;
        padding:0px;
    }
    .simpleCart_shelfItem h4{
    padding: 1em;
    background: #FDA30E;
    font-size: 1.1em;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    margin: 0 0 1em;
    }
    #shoppingbasket li{
        list-style-type: none;
    margin-bottom: 1em;
    font-size: 14px;
    color: #999;
    }
    #shoppingbasket li span{
        float:right;
    }
    #shoppingbasket{
        padding: 4px 25px;
}
</style>
</head>
<body>
<!-- header -->
<?php include('menu.php') ?>
<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Summary</h3>
	</div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
<div class="container">
<?php
    include_once('connect.php');
//        $productid = $_GET['pid'];
//        echo $productid;
    $sessionid = $_COOKIE['id'];
$orderid = strtoupper(uniqid(md5(rand(0,100000)+strtotime(date('curr_date')))));
    if(isset($_SESSION['email'])){
        $session = $_SESSION['email'];
    }
    else
        $session = "Guest";
//    echo $session;
        if($session == 'Guest'){
			$run_products = mysqli_query($con, "select * from cart where sessionid = '".$sessionid."' and emailid = 'Guest' ");
            ?>
          
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalsummary" style="background-color:#FDA30E;border-color:#FDA30E;">Login to Continue</button>
                   
            		<div class="modal fade" id="myModalsummary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="" name="c_email">	
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="c_pass" required="">
												
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
										<form method="post" action="auth1.php">
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

              
    <?php }
    else{
        $run_products = mysqli_query($con, "select * from cart where emailid = '".$session."' ");
        $sqlquery00 = mysqli_query($con, "select * from customers where customer_email=  '".$session."'");
        $resquery00 =  mysqli_fetch_array($sqlquery00);  
?>
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
           <h2>Shipping Address</h2>
           <br>
            <form class="form" id="summary" action="order" method="post">
            <input type="hidden" value="<?php echo $orderid; ?>" name="orderid"/>
            <div class="form-group">
			    <label>Name</label>
<input type="text" class="form-control" name="name" required value="<?php if($resquery00['customer_name'] != '')echo $resquery00['customer_name']; ?>" />         
			    </div>
           <div class="form-group">
			    <label>Email</label>
			    <input type="text" class="form-control" name="email" required value="<?php echo $resquery00['customer_email']; ?>" />         
			    </div>
        <div class="form-group">
			    <label>Contact</label>
			    <input type="text" class="form-control" name="contact" required value="<?php echo $resquery00['customer_contact']; ?>" />         
			    </div>

        <div class="form-group">
			    <label>Address</label>
			    <input type="text" class="form-control" name="address" required value="<?php echo $resquery00['customer_address']; ?>"/>         
			    </div>
			 <div class="form-group">
                <label>City</label>
			    <input type="text" class="form-control" name="city" required value="<?php echo $resquery00['customer_city']; ?>"/>         
			 </div>
			 <div class="form-group">
			     <label>Country</label>
			    <input type="text" class="form-control" name="country" required value="<?php echo $resquery00['customer_country']; ?>"/>         
			 </div>
			 <div class="form-group">
			    <label>Pincode</label>
			    <input type="text" class="form-control" name="pincode" required value="<?php echo $resquery00['pincode']; ?>"/>         
			 </div>
			 <button type="submit" class="btn btn-default">Place Order</button>
			</form>
		
		</div>
		<?php 
    }
    
    ?>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
				<h4>Shopping basket</h4>
					<ul id="shoppingbasket">
					<?php
                                
                            if(isset($_SESSION['email']))
	
                                $ip_add = $_SESSION['email'];
                        else
                                $ip_add = "Guest";
                        
                                $total = 0;

                            //	echo $ip_/add;
                        if($ip_add == 'Guest')        
                        $sel_price = "select * from cart where sessionid = '$sessionid' and emailid = 'Guest'";
                        else
                        $sel_price = "select * from cart where emailid = '$session'";
                                $run_price = mysqli_query($db, $sel_price);
                                
                                while($record = mysqli_fetch_array($run_price)){
                                    $cart_id = $record['id'];
                                    $pro_id = $record['p_id'];

                                    $qty = $record['qty'];

                                    $pro_price = "select * from products where product_id='$pro_id'";

                                    $run_pro_price = mysqli_query($con, $pro_price);

                                    while($p_price=mysqli_fetch_array($run_pro_price)){

                                        $product_price = array($p_price['product_price'] * $qty);

                                        $product_title = $p_price['product_title'];

                                        $product_image = $p_price['product_img1'];

                                        $only_price	= $p_price['product_price'];


                                        $values = array_sum($product_price );	



                                        $total += $values;		
                                        echo '<li id="del_'.$cart_id.'">'.$product_title.' <i>-</i> <span>&#8377;  '.$only_price * $qty.'</span></li>';

                                }
                            }
                        
                        ?>

						<li>Total <i>-</i> <span>&#8377; <?php  echo $total; ?></span></li>
						
					</ul>

					
					
		</div>
				<div class="clearfix"> </div>
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
				<!--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>-->
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<h4>SELECT YOUR ITEM</h4>
				<!--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>-->
			</div>
			<div class="col-md-3 coupons-gd">
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
