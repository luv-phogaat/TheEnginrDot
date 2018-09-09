<?php
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
	
}

else {
	
?>
<h2 class="text-center">View All Brands</h2>
<div class="container" style="width:100%;padding:10px 30px">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th style="text-align:center">Brand ID</th>
<th style="text-align:left">Brand Title</th>
<th style="text-align:center">Edit</th>
<th style="text-align:center">Delete</th>
</tr>
</thead>
<tbody>
<?php
include("includes/db.php");
$get_brands = "select * from brands";
$run_brands = mysqli_query($con, $get_brands);
while($row_brands = mysqli_fetch_array($run_brands)){
	
	$brand_id = $row_brands['brand_id'];
	$brand_title = $row_brands['brand_title'];
	
?>


<tr align="center">
<td><?php echo $brand_id; ?></td>
<td  style="text-align:left"><?php echo $brand_title; ?></td>
<td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
<td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
</tr>

<?php } ?>
</tbody>
</table>

</div>
</div>

<?php } ?>