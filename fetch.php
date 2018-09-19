<?php

//fetch.php

//$connect = new PDO("mysql:host=localhost;dbname=theenginrdot", "root", "");

$connect = new PDO("mysql:host=localhost;dbname=theengin_theenginrdot", "theengin_theengi", "theenginrdot123");


$query = "SELECT * FROM products WHERE cat_id= 1 AND product_price BETWEEN '".$_GET["minimum_range"]."' AND '".$_GET["maximum_range"]."' ORDER BY product_price ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
<h4 align="center">Total Item - '.$total_row.'</h4>
<br>
<div class="row">
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
            <div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem animated wow slideInLeft" data-wow-delay=".5s">
					<div class="men-thumb-item">
						<img src="admin_area/product_images/'.$row["product_img1"].'" alt="" class="pro-image-front">
						<img src="admin_area/product_images/'.$row["product_img1"].'" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="single" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>				
					</div>
					<div class="item-info-product ">
						<h4><a href="single">'.$row['product_title'].'</a></h4>
						<div class="info-product-price">
							<span class="item_price">&#8377; '.$row['product_price'].'</span>
							
						</div>
						<a href="mens?add_cart='.$row['product_id'].'" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
					</div>
				</div>
			</div>
		
		';
	}
}
else
{
	$output .= '
		<h3 align="center">No Product Found</h3>
	';
}

$output .= '
</div>
';

echo $output;

?>
