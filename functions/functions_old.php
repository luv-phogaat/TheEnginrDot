<?php
//echo $_COOKIE['id'];
if(isset($_SESSION['email']))
$GLOBALS['emailid'] =  $_SESSION['email'];
else
    $GLOBALS['emailid'] = "Guest";
if(isset($_COOKIE['id'])){
$GLOBALS['sessionid']  = $_COOKIE['id'];
}
//extablishing the connection
$db = mysqli_connect("localhost","root","","theenginrdot");
//$db = mysqli_connect("localhost","theengin_theengi","theenginrdot123","theengin_theenginrdot");
//function for getting ip address


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

//creating the script for cart

function cart(){
	if(isset($_GET['add_cart'])){
//		echo "this part cart";

	global $db;
		$p_id = $_GET['add_cart'];
		echo $p_id;
		$ip_add = $GLOBALS['emailid'];
		$sessionid = $GLOBALS['sessionid'];
        if($ip_add == 'Guest')
		$check_pro = "select * from cart where emailid = '$ip_add' AND p_id = '$p_id' and sessionid = '".$sessionid."'";
        else
		$check_pro = "select * from cart where emailid = '$ip_add' AND p_id = '$p_id'";
		
		$run_check = mysqli_query($db, $check_pro);
		if(mysqli_num_rows($run_check)>0){
			
			echo "<script>alert('Cart Already Exists');window.open('index', '_self')</script>";
			
//			echo "select part of cart";
		}
		
		else {
          echo "insert part";
			$sessionid = $GLOBALS['sessionid'];
			$q = "insert into cart (sessionid, p_id, emailid, qty) values ('$sessionid','$p_id', '$ip_add','1')";
			
			$run_q = mysqli_query($db, $q);
//			echo "hello world";
			if(isset($_GET['pid']))
            echo "<script>window.open('single?pid=".$_GET['pid']."', '_self')</script>";
			else
            echo "<script>window.open('index', '_self')</script>";
		}
		
	}
	
	
	
}

//getting the number of items from the cart


function items(){
	$sessionid = $GLOBALS['sessionid'];
	if(isset($_GET['add_cart'])){
		
		global $db;
		
		$ip_add = $GLOBALS['emailid'];
	    if($ip_add == 'Guest')
		$get_items = "select * from cart where sessionid = '$sessionid' and emailid = 'Guest'";
		else
        $get_items = "select * from cart where emailid = '$ip_add'";
		
		$run_items = mysqli_query($db, $get_items);
		
		$count_items = mysqli_num_rows($run_items);
		
	}
	
	
	else {
		
		global $db;
		
		$ip_add = $GLOBALS['emailid'];
	    if($ip_add == 'Guest')
		$get_items = "select * from cart where sessionid = '$sessionid' and emailid = 'Guest'";
		else
        $get_items = "select * from cart where emailid = '$ip_add'";
		
		$run_items = mysqli_query($db, $get_items);
		
		$count_items = mysqli_num_rows($run_items);
		
		
		
	}
	
	echo $count_items;
	
}


//getting the total price of the items from the cart

function total_price(){
	
    $ip_add = $GLOBALS['emailid'];
	global $db;
    $sessionid = $GLOBALS['sessionid'];
    if($ip_add == "Guest"){
        $sel_price = "select * from cart where sessionid = '$sessionid' and emailid = 'Guest'";
    }
    else{
         $sel_price = "select * from cart where emailid = '$ip_add'"; 
    }
	
    $total = 0;

    $run_price = mysqli_query($db, $sel_price);
	while($record = mysqli_fetch_array($run_price)){
		
		$pro_id = $record['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id'";
		
		$run_pro_price = mysqli_query($db, $pro_price);
		
		while($p_price=mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($p_price['product_price'] * $record['qty']);
			
			
			$values = array_sum($product_price);	


			$total += $values;		
			
		}
		
	}
	
	echo $total;
	
}



//getting the products to display

function getPro(){
	
	global $db;
	
		if(!isset($_GET['cat'])){
			
			if(!isset($_GET['brand'])){
			
			$get_products = "select * from products order by rand() LIMIT 0,12";
			
			$run_products = mysqli_query($db, $get_products);
			
			while($row_products = mysqli_fetch_array($run_products)){
			
			$pro_id = $row_products['product_id']; 
			$pro_title = $row_products['product_title'];
			$pro_cat = $row_products['cat_id'];
			$pro_brand = $row_products['brand_id'];
			$pro_desc = $row_products['product_desc'];
			$pro_price = $row_products['product_price'];
			$pro_image = $row_products['product_img1'];
//			$pro_image = $row_products[''];
			
			
            echo '
            <div class="col-md-3 product-men animated wow slideInLeft" data-wow-delay=".5s" style="margin-bottom:30px;">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="admin_area/product_images/'.$pro_image.'" alt="" class="pro-image-front">
									<img src="admin_area/product_images/'.$pro_image.'" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single?pid='.$pro_id.'" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">'.$pro_title.'</a></h4>
									<div class="info-product-price">
										<span class="item_price">&#8377;  '.$pro_price.'</span>
										<del>&#8377; 69.71</del>
									</div>
									<a href="index?add_cart='.$pro_id.'" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>

            ';    
                
//            echo "
//			
//			<div id= 'single_product'>
//			
//			<h3></h3>
//			
//			<img src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
//			
//			<p><b>Price: $ $pro_price</b></p>
//			
//			<a href='details.php?pro_id=$pro_id' style='float: left;'>Details</a>
//			
//			<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
//			
//			
//			</div>
//			
//			";
//			   
			}
        }
    }
}
function getPromens(){
	global $db;
	
		if(!isset($_GET['cat'])){
			
			if(!isset($_GET['brand'])){
			
			$get_products = "select * from products where cat_id = 1 order by product_title ASC";
			
			$run_products = mysqli_query($db, $get_products);
			
			while($row_products = mysqli_fetch_array($run_products)){
			
			$pro_id = $row_products['product_id']; 
			$pro_title = $row_products['product_title'];
			$pro_cat = $row_products['cat_id'];
			$pro_brand = $row_products['brand_id'];
			$pro_desc = $row_products['product_desc'];
			$pro_price = $row_products['product_price'];
			$pro_image = $row_products['product_img1'];
//			$pro_image = $row_products[''];
			
			
            echo '
            <div class="col-md-3 product-men" style="margin-bottom:30px;">
				<div class="men-pro-item simpleCart_shelfItem animated wow slideInLeft" data-wow-delay=".5s">
					<div class="men-thumb-item">
						<img src="admin_area/product_images/'.$pro_image.'" alt="" class="pro-image-front">
						<img src="admin_area/product_images/'.$pro_image.'" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="single?pid='.$pro_id.'" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>				
					</div>
					<div class="item-info-product ">
						<h4><a href="single">'.$pro_title.'</a></h4>
						<div class="info-product-price">
							<span class="item_price">&#8377; '.$pro_price.'</span>
						</div>
						<a href="mens?add_cart='.$pro_id.'" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
					</div>
				</div>
			</div>
            ';    
                
//            echo "
//			
//			<div id= 'single_product'>
//			
//			<h3></h3>
//			
//			<img src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
//			
//			<p><b>Price: $ $pro_price</b></p>
//			
//			<a href='details.php?pro_id=$pro_id' style='float: left;'>Details</a>
//			
//			<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
//			
//			
//			</div>
//			
//			";
//			   
			}
        }
    }
}
function getProwomens(){
	global $db;
	
		if(!isset($_GET['cat'])){
			
			if(!isset($_GET['brand'])){
			
			$get_products = "select * from products where cat_id = 2 order by product_title ASC";
			
			$run_products = mysqli_query($db, $get_products);
			
			while($row_products = mysqli_fetch_array($run_products)){
			
			$pro_id = $row_products['product_id']; 
			$pro_title = $row_products['product_title'];
			$pro_cat = $row_products['cat_id'];
			$pro_brand = $row_products['brand_id'];
			$pro_desc = $row_products['product_desc'];
			$pro_price = $row_products['product_price'];
			$pro_image = $row_products['product_img1'];
//			$pro_image = $row_products[''];
			
			
            echo '
            <div class="col-md-3 product-men" style="margin-bottom:30px;">
				<div class="men-pro-item simpleCart_shelfItem animated wow slideInLeft" data-wow-delay=".5s">
					<div class="men-thumb-item">
						<img src="admin_area/product_images/'.$pro_image.'" alt="" class="pro-image-front">
						<img src="admin_area/product_images/'.$pro_image.'" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="single?pid='.$pro_id.'" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>				
					</div>
					<div class="item-info-product ">
						<h4><a href="single">'.$pro_title.'</a></h4>
						<div class="info-product-price">
							<span class="item_price">&#8377; '.$pro_price.'</span>
						</div>
						<a href="mens?add_cart='.$pro_id.'" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
					</div>
				</div>
			</div>
            ';    
                
//            echo "
//			
//			<div id= 'single_product'>
//			
//			<h3></h3>
//			
//			<img src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
//			
//			<p><b>Price: $ $pro_price</b></p>
//			
//			<a href='details.php?pro_id=$pro_id' style='float: left;'>Details</a>
//			
//			<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
//			
//			
//			</div>
//			
//			";
//			   
			}
        }
    }
}



//getting the category products

function getCatPro(){
	
	global $db;
	
		if(isset($_GET['cat'])){
			
				$cat_id = $_GET['cat'];	
					
					
			$get_cat_pro = "select * from products where cat_id = '$cat_id'";
			
			$run_cat_pro = mysqli_query($db, $get_cat_pro);
			
			
			$count = mysqli_num_rows($run_cat_pro);
			
			if($count == 0){
				
				echo "<h2>No products found in this category!</h2>";
				
				
			}
			
			
			while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
			
			$pro_id = $row_cat_pro['product_id']; 
			$pro_title = $row_cat_pro['product_title'];
			$pro_cat = $row_cat_pro['cat_id'];
			$pro_brand = $row_cat_pro['brand_id'];
			$pro_desc = $row_cat_pro['product_desc'];
			$pro_price = $row_cat_pro['product_price'];
			$pro_image = $row_cat_pro['product_img1'];
			
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

		

}

//getting the brand products

function getBrandPro(){
	
	global $db;
	
		if(isset($_GET['brand'])){
			
				$brand_id = $_GET['brand'];	
					
					
			$get_brand_pro = "select * from products where brand_id = '$brand_id'";
			
			$run_brand_pro = mysqli_query($db, $get_brand_pro);
			
			
			$count = mysqli_num_rows($run_brand_pro);
			
			if($count == 0){
				
				echo "<h2>No products found in this brand!</h2>";
				
				
			}
			
			
			while($row_brand_pro = mysqli_fetch_array($run_brand_pro)){
			
			$pro_id = $row_brand_pro['product_id']; 
			$pro_title = $row_brand_pro['product_title'];
			$pro_cat = $row_brand_pro['cat_id'];
			$pro_brand = $row_brand_pro['brand_id'];
			$pro_desc = $row_brand_pro['product_desc'];
			$pro_price = $row_brand_pro['product_price'];
			$pro_image = $row_brand_pro['product_img1'];
			
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

		

}



//getting the brands display

function getBrands(){
	
	
	global $db;		
			$get_brands = "select * from brands";
			
			$run_brands = mysqli_query($db, $get_brands);
			
			while($row_brands = mysqli_fetch_array($run_brands)){
				
				$brand_id = $row_brands['brand_id'];
				$brand_title = $row_brands['brand_title'];
					 
				
			
			echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
			
			}
			
			
			
	
	
	
	
}



//getting the categories to display

function getCats(){
	
	
	
	
	global $db;
			
			$get_cats = "select * from categories";
			
			$run_cats = mysqli_query($db, $get_cats);
			
			while($row_cats = mysqli_fetch_array($run_cats)){
				
				$cat_id = $row_cats['cat_id'];
				$cat_title = $row_cats['cat_title'];
					 
				
			
			echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
			
			}
			
			
}


function emptycart(){
	
	global $db;
	$email = $GLOBALS['emailid'];
    if($email == 'Guest'){
            $sessionid = $GLOBALS['sessionid'];
            $get_cats = "delete from cart where emailid = 'Guest' and sessionid = '".$sessionid."'";
			
			$run_cats = mysqli_query($db, $get_cats);
        
		    echo "<script>window.open('index.php', '_self')</script>";
    }
    else if($email != "Guest"){
//            echo "<script>alert('this part');</script>";
			$get_cats = "delete from cart where emailid = '".$email."'";
			
			$run_cats = mysqli_query($db, $get_cats);
        
		    echo "<script>window.open('index.php', '_self')</script>";
	
    }
			
}

if(isset($_GET['empty'])){
//    echo "hello empty cart is here";
    emptycart();
}
//
//
function getresult0(){
    if( isset($_GET['searchname']) && isset($_GET['data'])){
        $value = $_GET['searchname'];
        $cat = $_GET['data'];
        getresult($value,$cat);
    }
}

function getresult($value,$cat){
	
	global $db;
	
            if($cat == "all"){
                $get_products = "select * from products where product_title LIKE '%$value%' ";
                $get_products11 = "select count(*) as count from products where product_title LIKE '%$value%' ";
            }
    else{
//			echo $value;
			 $get_products = "select * from products where product_title LIKE '%$value%'  and cat_id = '$cat'";
            $get_products11 = "select count(*) as count from products where product_title LIKE '%$value%' and cat_id = '$cat' ";
    }   
			$run_products = mysqli_query($db, $get_products);
			$run_products0 = mysqli_query($db, $get_products11);
    if(mysqli_num_rows($run_products) > 0){
        $row_product12  = mysqli_fetch_array($run_products0);
        $count  = $row_product12['count'];
//        $count  = $row_product12['count'];
        echo "<div>&nbsp;&nbsp;&nbsp;".$count." Products Found</div><br><br>";
			while($row_products = mysqli_fetch_array($run_products)){
			
			$pro_id = $row_products['product_id']; 
			$pro_title = $row_products['product_title'];
			$pro_cat = $row_products['cat_id'];
			$pro_brand = $row_products['brand_id'];
			$pro_desc = $row_products['product_desc'];
			$pro_price = $row_products['product_price'];
			$pro_image = $row_products['product_img1'];
//			$pro_image = $row_products[''];
			
            echo '
            
            <div class="col-md-3 product-men animated wow slideInLeft" data-wow-delay=".5s" style="margin-bottom:30px;">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="admin_area/product_images/'.$pro_image.'" alt="" class="pro-image-front">
									<img src="admin_area/product_images/'.$pro_image.'" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single?pid='.$pro_id.'" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">'.$pro_title.'</a></h4>
									<div class="info-product-price">
										<span class="item_price">&#8377;  '.$pro_price.'</span>
										<del>&#8377; 69.71</del>
									</div>
									<a href="index?add_cart='.$pro_id.'" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>

            ';    
                			   
			}
    }
    else{
        echo "<div class='text-center' style='padding-bottom:50px;'>";
        echo "<img src='images/notfound.png'";
        echo "</div>";
    }
}



?>