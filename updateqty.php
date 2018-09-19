<?php 
include "connect.php";

$id = $_POST['id'];
$value = $_POST['qty'];

$query = "update cart set qty = ".$value."  WHERE id=".$id;
mysqli_query($con,$query);

echo 1;
?>