<?php
include("includes/db.php");
include("functions/functions.php");
$price = total_price();
$getcount = items();
if($getcount > 0) $count = $getcount; else $count = 0 ;
echo "<i class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></i>
<span>&#8377; ".$price."</span> (<span>".$count."</span> items)";
//echo $price;