<?php
include("includes/db.php");
include("functions/functions.php");
//$price = ;
//$getcount = items();
//if($price == 0 || $price == 00) $price = 0;
//if($getcount > 0) $count = $getcount; else $count = 0 ;
echo "<i class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></i>
<span>&#8377; ";total_price();echo "</span> (<span>";items(); echo "</span> items)";
//echo $price;