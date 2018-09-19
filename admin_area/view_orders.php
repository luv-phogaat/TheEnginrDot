<?php

if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
	
}

else {
	
?>
<style>
        table{
            table-layout: fixed;
        }
</style>

<h2 class="text-center">View All Orders</h2>
<div class="container" style="width:100%;">
 <?php
              include("includes/db.php");
				/*How many records you want to show in a single page.*/
				$limit = 10;
				/*How may adjacent page links should be shown on each side of the current page link.*/
				$adjacents = 4;
				/*Get total number of records */
				$sql = "SELECT COUNT(*) 'total_rows' FROM `customer_orders`";
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
				$query  = "select * from customer_orders limit $offset, $limit";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0) { ?>

<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<tr align="center">
<th style="text-align:center">Order No</th>
<th style="text-align:left">Customer</th>
<th  style="text-align:center">Invoice No</th>
<th  style="text-align:center">Product ID</th>
<th  style="text-align:center">QTY</th>
<th  style="text-align:center">Status</th>
<th  style="text-align:center">#</th>
</tr>
</thead>
<tbody>
<?php
//
//$get_orders = "select * from customer_orders";
//
//$run_orders = mysqli_query($con, $get_orders);

$i = 0;

while($row_orders = mysqli_fetch_array($result)){
	
	$order_id = $row_orders['order_id'];
	$c_id = $row_orders['customer_id'];
	$invoice = $row_orders['invoice_no'];
	$p_id = $row_orders['product_id'];
	$qty = $row_orders['qty'];
	$status = $row_orders['order_status'];
	
	
	
//	$i++;
//echo $status;
?>


<tr align="center" class="<?php  if($status == 'Pending'){ echo 'danger'; }else{ echo 'success';} ?>">

<td><?php echo $order_id; ?></td>
<td  style="text-align:left;word-wrap:break-word;">
<?php

$get_customer = "select * from customers where customer_id='$c_id'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_email = $row_customer['customer_email'];

echo $customer_email;

?>


</td>
<td style="text-align:left;word-wrap:break-word;"><?php echo $invoice; ?></td>
<td><?php echo $p_id; ?></td>
<td><?php echo $qty; ?></td>
<td><?php echo $status; ?></td>
<td><a href="change_order_status.php?change_order_status=<?php echo $order_id; ?>&status=<?php echo $status; ?>">Change Status</a></td>

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
							<a class='page-link' href='?view_orders&page=1'>&lt;&lt;</a>
						</li>
						<!-- Link of the previous page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_orders&page=<?php ($page>1 ? print($page-1) : print 1)?>'>&lt;</a>
						</li>
						<!-- Links of the pages with page number -->
						<?php for($i=$start; $i<=$end; $i++) { ?>
						<li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
							<a class='page-link' href='?view_orders&page=<?php echo $i;?>'><?php echo $i;?></a>
						</li>
						<?php } ?>
						<!-- Link of the next page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_orders&page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>&gt;</a>
						</li>
						<!-- Link of the last page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_orders&page=<?php echo $total_pages;?>'>&gt;&gt;</a>
						</li>
					</ul>
				<?php } ?>

</div>
<?php } ?>