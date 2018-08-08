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
</head>
<body>
<!-- header -->
<?php include('menu.php'); ?>
<div class="page-head">
	<div class="container">
		<h3>Forgot Password</h3>
	</div>
</div>

	<div class="contact" style="padding-top:10px !important;">
		<div class="container">
			                     <div class="row">
                           <div class="col-md-2">
                               
                           </div>
                            <div class="col-sm-8">
                                    <div class="description">
                                        <br><h4 style="color: #000;text-align: center;font-size: 43px;">
                                          Reset Password: 
                                        </h4><br><br>
                                        <form method="post" action="newpassword1.php">
                                        <input type="hidden" name="token" value="<?php echo $_GET['id'] ?>">
                                        <input type="hidden" name="email" value="<?php echo $_GET['cid'] ?>">
                                     <label for="new_password">New Password:</label>
                                        <input type="password" id="new_password" placeholder="Enter Password" autocomplete="off" style="text-align: center;width: 750px;height: 55px;font-size: 24px;" name="newpass"/><br><br>
                                          <label for="confirm_new_password">Confirm New Password:</label>
                                        <input type="password" id="confirm_new_password" placeholder="Enter Password" autocomplete="off" style="text-align: center;width: 750px;height: 55px;font-size: 24px;" name="cnewpass"/><br><br>
                                        <input type="submit" value="SUBMIT" class="submit_forgot" autocomplete="off" style="font-size: 24px;width: 750px;height: 47px;"/>
                                        </form>
                                    </div>
                            </div>
                           <div class="col-md-2">
                           </div>
                        </div>
   
		</div>
	</div>
	
<!-- //contact -->

<!-- footer -->
<?php include('footer.php'); ?>
<!-- //footer -->
</body>
</html>
