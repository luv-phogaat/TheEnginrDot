<?php

include("includes/db.php");

if(isset($_GET['pay_status'])){
	
	$delete_id = $_GET['pay_status'];
	$status_old = $_GET['status'];  
//    echo $status.$delete_id;
	if($status_old == 'Unpaid')
        $status = 'Paid';
    
	$run_delete = mysqli_query($con, "update payments set status = '".$status."'  where payment_id = '".$delete_id."' ");
	
	if($run_delete){
		
		echo "<script>alert('Pay Status has been Changed!')</script>";
		
		echo "<script>window.open('index.php?view_payments','_self')</script>";	
		
	}
    else{
       echo "<script>alert('Error!')</script>";
		
		echo "<script>window.open('index.php?view_orders','_self')</script>";	
    }
//	
}



?>