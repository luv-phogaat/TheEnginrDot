<?php 

if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
	
}

else {
	
?>

<?php
if(isset($_GET['view_products'])){ ?>
<div class="container-fluid">
<h2 class="text-center">View All Products</h2>
 <?php
              include("includes/db.php");
				/*How many records you want to show in a single page.*/
				$limit = 10;
				/*How may adjacent page links should be shown on each side of the current page link.*/
				$adjacents = 4;
				/*Get total number of records */
				$sql = "SELECT COUNT(*) 'total_rows' FROM `products`";
				$res = mysqli_fetch_object(mysqli_query($con, $sql));
				$total_rows = $res->total_rows;
				/*Get the total number of pages.*/
				$total_pages = ceil($total_rows / $limit);
				
				
				if(isset($_GET['page']) && $_GET['page'] != "") {
					$page = $_GET['page'];
					$offset = $limit * ($page-1);
				} else {
					$page = 1;
					$offset = 0;
				}

//echo $limit;
				$query  = "select * from products  order by date desc limit $offset, $limit";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0) { ?>
<div class="table-responsive">          
<table class="table">

<thead>
<tr>

<th style="text-align:center">Product No</th>
<th>Title</th>
<th style="text-align:center">Image</th>
<th style="text-align:center">Price</th>
<th style="text-align:center">Total Sold</th>
<th style="text-align:center">Status</th>
<th style="text-align:center">Edit</th>
<th style="text-align:center">Delete</th>

</tr>
    </thead>
<?php


$i =0;

//$get_pro = "select * from products";

//$run_pro = mysqli_query($con, $query);

while($row_pro=mysqli_fetch_array($result)){
	
	$p_id = $row_pro['product_id'];
	$p_title = $row_pro['product_title'];
	$p_img = $row_pro['product_img1'];
	$p_price = $row_pro['product_price'];
	$status = $row_pro['status'];
	
	$i++;



?>
<tbody>
<tr align="center">
<td><?php echo $i; ?></td>
<td style="text-align:left"><?php echo $p_title; ?></td>
<td><img src="product_images/<?php echo $p_img; ?>" width="60" height="60"></td>
<td><?php echo $p_price; ?></td>
<td>
<?php

$get_sold = "select * from pending_orders where product_id='$p_id'";

$run_sold = mysqli_query($con, $get_sold);

$count = mysqli_num_rows($run_sold);


echo $count;

?>

</td>
<td><?php echo $status; ?></td>
<td><a href="index.php?edit_pro=<?php echo $p_id; ?>">Edit</a></td>
<td><a href="delete_pro.php?delete_pro=<?php echo $p_id; ?>">Delete</a></td>



</tr>
    </tbody>
<?php } ?>


</table>
</div>
<?php 
				}

				//Checking if the adjacent plus current page number is less than the total page number.
				//If small then page link start showing from page 1 to upto last page.
				if($total_pages <= (1+($adjacents * 2))) {
					$start = 1;
					$end   = $total_pages;
				} else {
					if(($page - $adjacents) > 1) {				   //Checking if the current page minus adjacent is greateer than one.
						if(($page + $adjacents) < $total_pages) {  //Checking if current page plus adjacents is less than total pages.
							$start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
							$end   = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
						} else {								   //If current page plus adjacents is greater than total pages.
							$start = ($total_pages - (1+($adjacents*2)));  //then the page range will start from total pages minus 1+($adjacents*2)
							$end   = $total_pages;						   //and the end will be the last page number that is total pages number.
						}
					} else {									   //If the current page minus adjacent is less than one.
						$start = 1;                                //then start will be start from page number 1
						$end   = (1+($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
					}
				}
				//If you want to display all page links in the pagination then
				//uncomment the following two lines
				//and comment out the whole if condition just above it.
				/*$start = 1;
				$end = $total_pages;*/
				?>
				
				<?php if($total_pages > 1) { ?>
					<ul class="pagination pagination-sm justify-content-center">
						<!-- Link of the first page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_products&page=1'>&lt;&lt;</a>
						</li>
						<!-- Link of the previous page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_products&page=<?php ($page>1 ? print($page-1) : print 1)?>'>&lt;</a>
						</li>
						<!-- Links of the pages with page number -->
						<?php for($i=$start; $i<=$end; $i++) { ?>
						<li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
							<a class='page-link' href='?view_products&page=<?php echo $i;?>'><?php echo $i;?></a>
						</li>
						<?php } ?>
						<!-- Link of the next page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_products&page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>&gt;</a>
						</li>
						<!-- Link of the last page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_products&page=<?php echo $total_pages;?>'>&gt;&gt;</a>
						</li>
					</ul>
				<?php } ?>
</div>
<?php } ?>

<?php } ?>