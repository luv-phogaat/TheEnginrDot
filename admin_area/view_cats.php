<?php
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
	
}

else {
	
?>


<h2 class="text-center">View All Categories</h2>
<div class="container" style="width:100%;">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th style="text-align:center">Category ID</th>
<th style="text-align:center">Category Title</th>
<th style="text-align:center">Edit</th>
<th style="text-align:center">Delete</th>
</tr>
</thead>
<tbody>
<?php
include("includes/db.php");
$get_cats = "select * from categories";
$run_cats = mysqli_query($con, $get_cats);
while($row_cats = mysqli_fetch_array($run_cats)){
	
	$cat_id = $row_cats['cat_id'];
	$cat_title = $row_cats['cat_title'];
	
	



?>


<tr align="center">
<td><?php echo $cat_id; ?></td>
<td><?php echo $cat_title; ?></td>
<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
</tr>

<?php } ?>
</tbody>
</table>
</div>
</div>

<?php } ?>