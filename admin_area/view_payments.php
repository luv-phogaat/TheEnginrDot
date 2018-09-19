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
<div class="container" style="width:100%">
<h2 class="text-center">View All Payments</h2>
<div class="table-responsive">
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
				$query  = "select * from payments order by payment_date desc limit $offset, $limit ";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0) { ?>
				
<table class="table table-hover table-striped">
<thead>
<tr align="center">
<th>Payment No</th>
<th>Invoice No</th>
<th>Amount Paid</th>
<th>Payment Method</th>
<th>Payment Date</th>
<th>Status</th>
<th>#</th>
</tr>
</thead>
<tbody>
<?php


//$get_payments = "select * from payments";

//$run_payments = mysqli_query($con, $get_payments);
//
$i = 0;

while($row_payments = mysqli_fetch_array($result)){
	
	$payment_id = $row_payments['payment_id'];
	$invoice = $row_payments['invoice_no'];
	$amount = $row_payments['amount'];
	$payment_m = $row_payments['payment_mode'];
	$status = $row_payments['status'];
	$date = $row_payments['payment_date'];
	
	
	
	$i++;

?>


<tr align="center" class="<?php  if($status == 'Unpaid'){ echo 'danger'; }else{ echo 'success';} ?>">

<td><?php echo $i; ?></td>

<td style="text-align:left;word-wrap:break-word;"><?php echo $invoice; ?></td>

<td><?php echo $amount; ?></td>
<td style="text-align:left"><?php echo $payment_m; ?></td>
<td style="text-align:left"><?php echo $date; ?></td>
<td style="text-align:left"><?php echo $status; ?></td>
<?php if($status != 'Paid'){ ?>
<td style="text-align:left"><a href="change_pay_status.php?pay_status=<?php echo $payment_id; ?>&status=<?php echo $status; ?>">Pay Now</a></td>
</tr>
<?php }else echo '<td style="text-align:left;color:#337ab7;">'.$status.'</td>' ?>
<?php } ?>
</tbody>
</table>
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
							<a class='page-link' href='?view_payments&page=1'>&lt;&lt;</a>
						</li>
						<!-- Link of the previous page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_payments&page=<?php ($page>1 ? print($page-1) : print 1)?>'>&lt;</a>
						</li>
						<!-- Links of the pages with page number -->
						<?php for($i=$start; $i<=$end; $i++) { ?>
						<li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
							<a class='page-link' href='?view_payments&page=<?php echo $i;?>'><?php echo $i;?></a>
						</li>
						<?php } ?>
						<!-- Link of the next page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_payments&page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>&gt;</a>
						</li>
						<!-- Link of the last page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?view_payments&page=<?php echo $total_pages;?>'>&gt;&gt;</a>
						</li>
					</ul>
				<?php } ?>

</div>
</div>
<?php } ?>