<?php 
include "connect.php";

$id = $_POST['id'];

// Delete record
$query = "DELETE FROM cart WHERE id=".$id;
mysqli_query($con,$query);

echo 1;
?>