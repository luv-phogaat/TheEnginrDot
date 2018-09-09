<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout | The Enginr Dot</title>
<!-- for-mobile-apps -->
<link rel="shortcut icon" type="image/x-icon" href="images/logotab.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="The Enginr Dot Clothes Website, The Enginr Dot Responsive Website, The Enginr Dot Website, The Enginr Dot Android Compatible Website, 
Smartphone Compatible Website, Men's & Women's Wear Website" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
</head>
<body>
<!-- header -->
<?php include("menu.php"); ?>
<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Cart</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Price</th>
					</tr>
				</thead>
				<?php
$session_id =$_COOKIE['id'];
//                echo $session_id;
if(isset($_SESSION['email']))
	
                                $ip_add = $_SESSION['email'];
                        else
                                $ip_add = "Guest";
                
	
	$total = 0;
	
//	echo $ip_/add;

    if($ip_add == 'Guest')
    $sel_price = "select * from cart where sessionid = '$session_id' and emailid = 'Guest'";
	else
        $sel_price = "select * from cart where emailid = '$ip_add'";
	$run_price = mysqli_query($db, $sel_price);
	
	while($record = mysqli_fetch_array($run_price)){
	    $c_id =  $record['id'];	
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
?>

					<tr class="rem<?php echo $c_id; ?>">
						<td class="invert-closeb">
							<div class="rem">
								<div class="fa fa-window-close delete" id="del_<?php echo $c_id; ?>" style="font-size:28px;cursor: pointer;"> </div>
							</div>
						</td>
						<td class="invert-image"><a href="single"><img src="admin_area/product_images/<?php echo $product_image; ?>" alt=" " class="img-responsive" width="50px" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus" id="plus_<?php echo $c_id; ?>">&nbsp;</div>
									<div class="entry value"><span><?php  echo $qty; ?></span></div>
									<div class="entry value-plus active" id="plus_<?php echo $c_id; ?>">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert"><?php echo ucwords($product_title) ?></td>
						<td class="invert">&#8377; <?php echo number_format($only_price,2) ?></td>
					</tr>
					<script>
									$('.value-plus').on('click', function(){
                                        var id = this.id;
                                        var splitid = id.split("_");
                                        var cartid1 = splitid[1];
										var divUpd = $(this).parent().find('.value'); newVal = parseInt(divUpd.text(), 10)+1;
//                                        alert(divUpd.text);
                                        $.ajax({
                                            url: 'updateqty.php',
                                            type: 'POST',
                                            data: { id:cartid1 ,qty:newVal },
                                            success: function(response){
//                                              console.log(response);  
                                               
                                                $.ajax({
                                                url: 'shoppingbag.php',
                                                type: 'GET',
                                                success: function(response1){
                                                document.getElementById('shoppingbasket').innerHTML = response1;
                                                 divUpd.text(newVal);

                                                }
                                                });
                                           $("#total").load("shoppingbag1.php");
                                            }
                                            });

										
									});

									$('.value-minus').on('click', function(){
                                        var id = this.id;
                                        var splitid = id.split("_");
                                        var cartid1 = splitid[1];
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										 $.ajax({
                                            url: 'updateqty.php',
                                            type: 'POST',
                                            data: { id:cartid1 ,qty:newVal },
                                            success: function(response){
//                                              console.log(response);  
                                               
                                                $.ajax({
                                                url: 'shoppingbag.php',
                                                type: 'GET',
                                                success: function(response1){
                                                document.getElementById('shoppingbasket').innerHTML = response1;
                                                if(newVal > 0)    
                                                    divUpd.text(newVal);

                                                }
                                                });
                                                $("#total").load("shoppingbag1.php");
                                            }
                                            });
									});
									</script>	
						<?php
            
        }
    }

                ?>							
			</table>
		</div>
		
		
		
	
		
		
		<!-----Shopping Bag Ends Here------>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="javascript:history.back();"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
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
                        $sel_price = "select * from cart where sessionid = '$session_id' and emailid = 'Guest'";
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
                                        echo '<li id="del_'.$cart_id.'">'.$product_title.' <i>-</i> <span>&#8377;  '.number_format($only_price * $qty,2).'</span></li>';

                                }
                            }
                        
                        ?>

						<li>Total <i>-</i> <span>&#8377; <?php  echo total_price(); ?></span></li>
						
					</ul>
					<?php
        if($ip_add == 'Guest')        
                        $sel_price1 = "select * from cart where sessionid = '$session_id' and emailid = 'Guest'";
                        else
                        $sel_price1 = "select * from cart where emailid = '$ip_add'";
                                $run_price1 = mysqli_query($db, $sel_price1);
                                if(mysqli_num_rows($run_price1) > 0){
        ?>
        
        <div>
            <a href="summary" class="btn btn-default" style="background: #FDA30E;border-color:#FDA30E;color:#fff;width:100%;border-radius:0px;">CHECKOUT <i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i></a>
        </div>
        <?php }?>
				</div>
				<div class="clearfix"> </div>
			</div>
       
	</div>
</div>	
<!-- //check out -->
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
<script>
    $(document).ready(function(){

 // Delete 
 $('.delete').click(function(){
  var el = this;
  var id = this.id;
  var splitid = id.split("_");

  // Delete id
  var deleteid = splitid[1];
 
  // AJAX Request
  $.ajax({
   url: 'remove.php',
   type: 'POST',
   data: { id:deleteid },
   success: function(response){

   
      $.ajax({
        url: 'shoppingbag.php',
        type: 'GET',
        success: function(response1){
         // Removing row from HTML Table
            $(el).closest('tr').css('background','tomato');
            $(el).closest('tr').fadeOut(800, function(){ 
             $(this).remove();
            });
            document.getElementById('shoppingbasket').innerHTML = response1;
        }
        });
       $("#total").load("shoppingbag1.php");
//       $.ajax({
//        url: 'shoppingbag1.php',
//        type: 'GET',
//        success: function(response2){
////            console.log(response2);
////            alert(document.getElementById('total').innerHTML);
//            alert(response2);
////            document.getElementById('total').innerHTML = response2;
//        }
//        });
   }
  });

 });

});
</script>
<!-- footer -->
<?php  include('footer.php'); ?>
<!-- //footer -->
</body>
</html>
