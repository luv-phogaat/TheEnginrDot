<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include "connect.php";
//echo $_SESSION['email'];
if(isset($_SESSION['email']))
	$ip_add = $_SESSION['email'];
else
    $ip_add = "Guest";
$session_id = $_COOKIE['id'];
//$id = $_POST['id'];
//$value = $_POST['qty'];
//echo $session_id;
//echo $ip_add;
$total = 0;

                    
//	echo $ip_/add;
           if($ip_add == "Guest")
                                $sel_price = "select * from cart where sessionid = '$session_id' and emailid = 'Guest'";
else
                                $sel_price = "select * from cart where emailid = '$ip_add'";
                                $run_price = mysqli_query($con, $sel_price);
                                
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
						