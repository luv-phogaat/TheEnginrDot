<?php

include("includes/db.php");

if(isset($_GET['change_order_status'])){
	
	$delete_id = $_GET['change_order_status'];
	$status_old = $_GET['status']; 
    if($status_old == 'Pending')
        $status = "Complete";
    else if($status_old == 'Complete')
        $status = "Pending";
    
//    echo $status.$delete_id;
	
//    print($con);
    
	$run_delete = mysqli_query($con, "update customer_orders set order_status = '".$status."'  where order_id = '".$delete_id."' ");
	
	if($run_delete){
		
		echo "<script>alert('Order Status has been Changed!')</script>";
		
		echo "<script>window.open('index.php?view_orders','_self')</script>";	
		
	}
    else{
       echo "<script>alert('Error!')</script>";
		
		echo "<script>window.open('index.php?view_orders','_self')</script>";	
    }
//	
}



?>