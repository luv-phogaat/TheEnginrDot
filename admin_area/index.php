<?php 

session_start();

if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
	
}

else {
	$cyear = date('Y');
    include("../connect.php");
    $sqlquery = mysqli_query($con,"select year(order_date) as 'YEAR',SUM(month(order_date) = 1) as 'JAN',SUM(month(order_date) = 2) as 'FEB',SUM(month(order_date) = 3) as 'MAR',SUM(month(order_date) = 4 ) as 'APR',SUM(month(order_date) = 5 ) as 'MAY',SUM(month(order_date) = 6 ) as 'JUN',SUM(month(order_date) = 7 ) as 'JUL',SUM(month(order_date) = 8 ) as 'AUG',SUM(month(order_date) = 9 ) as 'SEP',SUM(month(order_date) = 10 ) as 'OCT',SUM(month(order_date) = 11 ) as 'NOV',SUM(month(order_date) = 12 ) as 'DEC' FROM customer_orders where YEAR(order_date) = '".$cyear."'  GROUP BY 1 ");

    $resfeed= mysqli_fetch_array($sqlquery);
    
    $sqlqueryc = mysqli_query($con,"select year(order_date) as 'YEAR',SUM(month(order_date) = 1) as 'JAN',SUM(month(order_date) = 2) as 'FEB',SUM(month(order_date) = 3) as 'MAR',SUM(month(order_date) = 4 ) as 'APR',SUM(month(order_date) = 5 ) as 'MAY',SUM(month(order_date) = 6 ) as 'JUN',SUM(month(order_date) = 7 ) as 'JUL',SUM(month(order_date) = 8 ) as 'AUG',SUM(month(order_date) = 9 ) as 'SEP',SUM(month(order_date) = 10 ) as 'OCT',SUM(month(order_date) = 11 ) as 'NOV',SUM(month(order_date) = 12 ) as 'DEC' FROM customer_orders where YEAR(order_date) = '".$cyear."' AND  order_status = 'Complete' GROUP BY 1");
    
    $rescomplete = mysqli_fetch_array($sqlqueryc);
    
    $sqlqueryp = mysqli_query($con,"select year(order_date) as 'YEAR',SUM(month(order_date) = 1) as 'JAN',SUM(month(order_date) = 2) as 'FEB',SUM(month(order_date) = 3) as 'MAR',SUM(month(order_date) = 4 ) as 'APR',SUM(month(order_date) = 5 ) as 'MAY',SUM(month(order_date) = 6 ) as 'JUN',SUM(month(order_date) = 7 ) as 'JUL',SUM(month(order_date) = 8 ) as 'AUG',SUM(month(order_date) = 9 ) as 'SEP',SUM(month(order_date) = 10 ) as 'OCT',SUM(month(order_date) = 11 ) as 'NOV',SUM(month(order_date) = 12 ) as 'DEC' FROM customer_orders where YEAR(order_date) = '".$cyear."' AND  order_status = 'Pending' GROUP BY 1");
    
    $respending = mysqli_fetch_array($sqlqueryp);
    
?>



<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
  <script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
        var data = google.visualization.arrayToDataTable([
         ['Month', 'Orders'],
         ['JAN', <?php echo $resfeed[1]; ?>], 
         ['FEB', <?php echo $resfeed[2]; ?>], 
         ['MAR', <?php echo $resfeed[3]; ?>],
         ['APR', <?php echo $resfeed[4]; ?>], 
         ['MAY', <?php echo $resfeed[5]; ?>], 
         ['JUN', <?php echo $resfeed[6]; ?>], 
         ['JUL', <?php echo $resfeed[7]; ?>], 
         ['AUG', <?php echo $resfeed[8]; ?>], 
         ['SEP', <?php echo $resfeed[9]; ?>], 
         ['OCT', <?php echo $resfeed[10]; ?>], 
         ['NOV', <?php echo $resfeed[11]; ?>], 
         ['DEC', <?php echo $resfeed[12]; ?>], 
    ]);

      var options = {
        title: 'Products Orders Received - <?php echo $resfeed[0] ?>',
        legend: { position: 'bottom'},
        vAxis: {
          title: 'No. of orders (Monthly)'
        },
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }  

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries1);

function drawMultSeries1() {
        var data1 = google.visualization.arrayToDataTable([
         ['Month', 'Pending Orders' , 'Completed Orders'],
         ['JAN', <?php echo $respending[1]; ?>,<?php echo $rescomplete[1]; ?>], 
         ['FEB', <?php echo $respending[2]; ?>,<?php echo $rescomplete[2]; ?>], 
         ['MAR', <?php echo $respending[3]; ?>,<?php echo $rescomplete[3]; ?>],
         ['APR', <?php echo $respending[4]; ?>,<?php echo $rescomplete[4]; ?>], 
         ['MAY', <?php echo $respending[5]; ?>,<?php echo $rescomplete[5]; ?>], 
         ['JUN', <?php echo $respending[6]; ?>,<?php echo $rescomplete[6]; ?>], 
         ['JUL', <?php echo $respending[7]; ?>,<?php echo $rescomplete[7]; ?>], 
         ['AUG', <?php echo $respending[8]; ?>,<?php echo $rescomplete[8]; ?>], 
         ['SEP', <?php echo $respending[9]; ?>,<?php echo $rescomplete[9]; ?>], 
         ['OCT', <?php echo $respending[10]; ?>,<?php echo $rescomplete[10]; ?>], 
         ['NOV', <?php echo $respending[11]; ?>,<?php echo $rescomplete[11]; ?>], 
         ['DEC', <?php echo $respending[12]; ?>,<?php echo $rescomplete[12]; ?>], 
    ]);

      var options1 = {
        title: 'Products Pending Orders and Completed Order - <?php echo $resfeed[0] ?>',
        legend: { position: 'bottom'},
        vAxis: {
          title: 'No. of orders (Monthly)'
        },
      };

      var chart1 = new google.visualization.ColumnChart(
        document.getElementById('chart_div1'));

      chart1.draw(data1, options1);
    }  
    </script>
</head>
<body>

<div class="wrapper1" style="padding:0px;">
<a href="index.php"><div class="header"></div></a>

<div class="right"    >
<h2>Manage Content</h2>
<a href="index.php?logged_in">Home</a>
<a href="index.php?insert_product">Insert New Product</a>
<a href="index.php?view_products">View All Products</a>
<a href="index.php?insert_cat">Insert New Category</a>
<a href="index.php?view_cats">View All Categories</a>
<a href="index.php?insert_brand">Insert New Brand</a>
<a href="index.php?view_brands">View All Brands</a>
<a href="index.php?view_customers">View Customers</a>
<a href="index.php?view_orders">View Orders</a>
<a href="index.php?view_payments">View Payments</a>
<a href="logout.php">Admin Logout</a>
</div>

<div class="left">
<?php
if(isset($_GET['logged_in'])){
	?>
    <h1 style="color:red; text-align:center;">Dashboard</h1>
     <div id="chart_div" style="margin-left:20px;min-height:320px;"></div>
     <div id="chart_div1" style="margin-left:20px;min-height:320px;"></div>
	
<?php } 
    
include("includes/db.php");

if(isset($_GET['insert_product'])){
	
	include("insert_product.php");
	
}

if(isset($_GET['view_products'])){
	
	include("view_products.php");
	
}


if(isset($_GET['edit_pro'])){
	
	include("edit_pro.php");
	
}


if(isset($_GET['view_cats'])){
	
	include("view_cats.php");
	
}

if(isset($_GET['insert_cat'])){
	
	include("insert_cat.php");
	
}

if(isset($_GET['edit_cat'])){
	
	include("edit_cat.php");
	
}

if(isset($_GET['insert_brand'])){
	
	include("insert_brand.php");
	
}

if(isset($_GET['view_brands'])){
	
	include("view_brands.php");
	
}

if(isset($_GET['edit_brand'])){
	
	include("edit_brand.php");
	
}


if(isset($_GET['view_customers'])){
	
	include("view_customers.php");
	
}


if(isset($_GET['view_orders'])){
	
	include("view_orders.php");
	
}

if(isset($_GET['view_payments'])){
	
	include("view_payments.php");
	
}


?>

</div>

</div>


</body>
</html>


<?php } ?>