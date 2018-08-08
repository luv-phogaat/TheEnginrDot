<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>The Enginr Dot</title>
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
    li{
        list-style-type: none !important;
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
		<h3>Order</h3>
	</div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
	<div class="container">
           <div id="content">
        <div class="container">
            <main id="main">
                <article>
                    <section id="section_1">
                        <div class="row">
                           <div class="col-md-2">
                               
                           </div>
                            <div class="col-sm-8">
                                    <div class="description">
                                        <h4 style="color:#3c3737;">
                                           Your order has been received and is now being processed. Your order details are shown below for your reference:
                                        </h4>
                                    </div>
                            </div>
                            <div class="col-md-2">
                               
                           </div>
                        </div>
                    </section>
                    <section>
                        <div class="row">
                           <div class="col-md-2">
                              
                           </div>
                           <div class="col-md-8" style="color:#999">
                                <h3><b>Order ID: #<?php echo $_POST['orderid'] ?></b></h3>
                           </div>
                            <div class="col-md-2">
                              
                           </div>
                        </div>
                    </section>
                    <section>
                       <br>
                        <div class="row">
                              <div class="col-md-2">
                                  
                              </div>
                               <div class="col-md-8">
                                <table cellpadding="10" class="table table-striped table-hover table-bordered"> 
                                  <thead>
                                   <tr>
                                    <th><b>Product</b></th>
                                    <th><b>Quantity</b></th>
                                    <th><b>Price</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
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
                        $sel_price = "select * from cart where emailid = '$ip_add'";
                                $run_price = mysqli_query($db, $sel_price);
                                
                                while($record = mysqli_fetch_array($run_price)){
                                    $cart_id = $record['id'];
                                    $pro_id = $record['p_id'];

                                    $qty = $record['qty'];

                                    $pro_price = "select * from products where product_id='$pro_id'";

                                    $run_pro_price = mysqli_query($con, $pro_price);

                                    while($p_price=mysqli_fetch_array($run_pro_price)){

                                        $product_price = array($p_price['product_price']);

                                        $product_title = $p_price['product_title'];

                                        $product_image = $p_price['product_img1'];

                                        $only_price	= $p_price['product_price'];


                                        $values = array_sum($product_price);	



                                        $total += $values;
echo '<tr>';                                        
echo '<td>'.$product_title.'</td>';
echo '<td>'.$qty.'</td>';
echo '<td>'.$only_price * $qty.'</td>';
echo '</tr>';
                                }
                            }
    
                        
                        ?>
                                  <tr>
                                      <td colspan="2" align="right">Total</td>
                                      <td><?php echo $total; ?></td>
                                  </tr>
                                   </tbody>
                            </table>
                            </div>
                             <div class="col-md-2">
                                  
                              </div>
                        </div>
                    </section>
                    <section>
                         <div class="row">
                              <div class="col-md-2">
                                  
                              </div>
                              <div class="col-md-8">
                                  <h3 style="color:#999;"><b><br>Customer and Shipping Details:</b></h3>
                              </div>
                              <div class="col-md-2">
                                  
                              </div>
                        </div>
                        </section>
                     <section>
                         <div class="row">
                              <div class="col-md-2">
                                  
                              </div>
                              <div class="col-md-8">
                                  <ul style="padding: 32px;list-styl-type:none">
                                     <li><b>Name:</b> <?php echo $_POST['name'] ?></li>
                                      <li><b>Address:</b><?php echo $_POST['address'] ?><br><?php echo $_POST['city'] ?><br><?php  echo $_POST['country'] ?><br><?php echo $_POST['pincode'] ?></li>
                                      
                                      <li><b>Email:</b> <?php echo $_POST['email'] ?></li>
                                      
                                  </ul>
                              </div>
                              <div class="col-md-2">
                                  
                              </div>
                        </div>
                        <div class="row">
                            <a href="index" class="btn btn-success pull-right">Close</a>
                        </div>

                    </section>
                </article>
            </main>
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
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
<!--
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form>
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
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
										<form>
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">Forgot password?</a>
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
-->					</div>

				</div>
			</div>
<!-- //login -->
</body>
</html>
<?php
require_once('connect.php');
require('mail_setting.php');
$sessionid = $_COOKIE['id'];
if(isset($_SESSION['email']))
$ip_add = $_SESSION['email'];
else
$ip_add = "Guest";
$total = 0;
//	echo $ip_/add;
if($ip_add == 'Guest')        
   echo "<script>alert('Kindly login first!');window.location='index'</script>";
else{
$sel_price = "select * from cart where emailid = '$ip_add'";
$run_price = mysqli_query($db, $sel_price);

$sqlquery001 = mysqli_query($con,"update customers set customer_name = '".$_POST['name']."', customer_country = '".$_POST['country']."' , customer_city = '".$_POST['city']."',customer_address = '".$_POST['address']."', pincode = '".$_POST['pincode']."' where customer_email = '".$ip_add."'");
$sqlquery002 = mysqli_query($con,"select * from customers where customer_email = '".$ip_add."'");
$resquery002 = mysqli_fetch_array($sqlquery002);
    
}
$mail->setFrom('noreply@theenginrdot.in', 'TheEnginrDot');
$mail->addAddress($ip_add);   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML
$mail->AddEmbeddedImage('images/logomaker.jpg', 'imglogo2'); 
$bodyContent = '<center><img src="cid:imglogo2" /></center>';
$bodyContent .= '<br><br><br>Order Number : '.$_POST['orderid'].'<br><br>Your order has been received and is now being processed. Your order details are shown below for your reference:';
$bodyContent .= '<p></p><br>';

$bodyContent .= "<table border='2' cellpadding='5'><tr><td>Product Name</td><td>Product Qty</td><td>Product Price</td><td>Total Product Price</td></tr>";
                                while($record = mysqli_fetch_array($run_price)){
                                    $cart_id = $record['id'];
                                    $pro_id = $record['p_id'];

                                    $qty = $record['qty'];

                                    $pro_price = "select * from products where product_id='$pro_id'";

                                    $run_pro_price = mysqli_query($con, $pro_price);

                                    while($p_price=mysqli_fetch_array($run_pro_price)){

                                        $product_price = array($p_price['product_price']);

                                        $product_title = $p_price['product_title'];

                                        $only_price	= $p_price['product_price'];
//$product sum = 

                                        $values = array_sum($product_price);	
$sqlqueryo  = mysqli_query($con,"insert into customer_orders(customer_id,due_amount,invoice_no, qty, product_id) values('".$resquery002['customer_id']."','".$only_price."','".$_POST['orderid']."','".$qty."','".$pro_id."')");

$total += $values * qty ;		
$bodyContent .= "<tr><td>".$product_title."</td><td>".$qty."</td><td>".$only_price."</td><td>".$only_price * $qty."</td></tr>";

                                }
                            }
                        
//echo $_POST['orderid'];

$sqlqueryp  = mysqli_query($con,"insert into payments(invoice_no, amount) values('".$_POST['orderid']."','".$total."')");
//if($sqlqueryp)echo "done";

$bodyContent .= "<tr><td colspan='3'>Total</td><td>".$total."</td></tr>";
$bodyContent .= "</table>";
$bodyContent .="<br><h3>Customer and Shipping Details</h3>";
$bodyContent .= "<p><b>Name : </b>".$_POST['name']."</p>
                                      <p><b>Address : </b>".$_POST['address']."<br>".$_POST['city']."<br>".$_POST['country']."<br>".$_POST['pincode']."</p>
                                      
                                      <p><b>Email : </b>".$_POST['email']."</p></ul>";
$mail->Subject = 'TheEnginrDot - Order';
$mail->Body    = $bodyContent;


$removecartquery = mysqli_query($con,"delete from cart where emailid = '".$ip_add."'");

    if($sqlqueryo && $sqlqueryp && $removecartquery && $mail->send()){
        ?>  
        <script>alert('Check your mail for further details');window.location='index'</script>
        <?php
        
    }
else{
    echo "error";
}
//echo $bodyContent;
?>