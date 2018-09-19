<?php 

if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
	
}

else {
	
?>
<div class="container" style="width:100%;">
<h2 class="text-center">View All Customers</h2>
 <?php
              include("includes/db.php");
				/*How many records you want to show in a single page.*/
				$limit = 10;
				/*How may adjacent page links should be shown on each side of the current page link.*/
				$adjacents = 4;
				/*Get total number of records */
				$sql = "SELECT COUNT(*) 'total_rows' FROM `customers`";
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
				$query  = "select * from customers limit $offset, $limit";
				$get_c1 = mysqli_query($con, $query);
				if(mysqli_num_rows($get_c1) > 0) { ?>
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<tr align="center">
<th style="text-align:center">S.No.</th>
<th>Name</th>
<th>Email</th>
<th>Country</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php

$run_c = mysqli_query($con, $query);

$i = 0;

while($row_c = mysqli_fetch_array($run_c)){
	
	$c_id = $row_c['customer_id'];
	$c_name = $row_c['customer_name'];
	$c_email = $row_c['customer_email'];
	$c_country = $row_c['customer_country'];
	$i++;
?>


<tr align="center">

<td><?php echo $i; ?></td>
<td style="text-align:left"><?php echo $c_name; ?></td>
<td style="text-align:left"><?php echo $c_email; ?></td>
<td style="text-align:left"><?php echo $c_country; ?></td>
<td style="text-align:left"><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>

</tr>

<?php } ?>
</tbody>
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