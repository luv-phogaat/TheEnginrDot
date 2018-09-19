<?php
//$msg = "Cron job testing";
//mail("luv.phogaat@gmail.com","Cron Testing",$msg);
include('connect.php');
$query = mysqli_query($con,"DELETE FROM cart WHERE entry_date < NOW() - INTERVAL 90 DAY");
?>