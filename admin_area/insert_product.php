<style>
    .right{
        height:1085px !important;
    }
    .left{
        height:auto;
    }
</style>

<?php
include("includes/db.php");

if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
	
}

else {
	
?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<h1 class="text-center">Add New product</h1>
<div class="container" style="width:100%;padding: 10px 50px;">
<form method= "post" action="insert_product.php" enctype="multipart/form-data">
    
	<div class="form-group">
	    <label>Product Title</label>
	    <input type="text" name="product_title" size="50" class="form-control" required />
	</div>
	<div class="form-group">
	    <label>Product Category</label>
	    <select name="product_cat" class="form-control" required>
	<?php
			
			$get_cats = "select * from categories";
			
			$run_cats = mysqli_query($con, $get_cats);
			
			while($row_cats = mysqli_fetch_array($run_cats)){
				
				$cat_id = $row_cats['cat_id'];
				$cat_title = $row_cats['cat_title'];
					 
				
			
			echo "<option value='$cat_id'>$cat_title</option>";
			
			}
			 
			?>
	
	
	</select>
	</div>
	<div class="form-group">
	    <label>Product Label</label>
	    	<select name="product_brand" class="form-control" required>
	<?php
			
			$get_brands = "select * from brands";
			
			$run_brands = mysqli_query($con, $get_brands);
			
			while($row_brands = mysqli_fetch_array($run_brands)){
				
				$brand_id = $row_brands['brand_id'];
				$brand_title = $row_brands['brand_title'];
					 
				
			
			echo "<option value='$brand_id'>$brand_title</option>";
			
			}
			
			?>
			
	
	</select>

	</div>
	<div class="form-group">
	    <label for="">Product Image 1</label>
	    <input type="file" name="product_img1" class="form-control" required>
	</div>
	<div class="form-group">
	    <label for="">Product Image 2</label>
	    <input type="file" name="product_img2" class="form-control">
	</div>
	<div class="form-group">
	      <label for="">Product Image 3</label>
	    <input type="file" name="product_img3" class="form-control">
	</div>
	<div class="form-group">
	    <label for="">Product Price</label>
	    <input type="text" name="product_price" class="form-control" required />
	</div>
	<div class="form-group">
	    <label for="">Product Description</label>
	    <textarea name="product_desc" cols="35" rows="10" class="form-control" required></textarea>
	</div>
	<div class="form-group">
	    <label for="">Product Keywords</label>
	    <input type="text" name="product_keywords" size="50" class="form-control" required/>
	</div>
	<div class="form-group">
	    <input type="submit" name="update_product" value="Add Product" class="btn btn-default"/>
	</div>
</form>
</div>


<?php

if(isset($_POST['insert_product'])){
	
	
	//text data variables
	$product_title = $_POST['product_title'];
	$product_cat = $_POST['product_cat'];
	$product_brand = $_POST['product_brand'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$status = 'on';
	$product_keywords = $_POST['product_keywords'];
	
	//image names
	
	$product_img1 = $_FILES['product_img1']['name'];
	$product_img2 = $_FILES['product_img2']['name'];
	$product_img3 = $_FILES['product_img3']['name'];
	
	//Image temp names
	
	$temp_name1 = $_FILES['product_img1']['tmp_name'];
	$temp_name2 = $_FILES['product_img2']['tmp_name'];
	$temp_name3 = $_FILES['product_img3']['tmp_name'];
	
	if($product_title=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' Or $product_keywords=='' OR $product_img1==''){
		
		echo "<script>alert('please fill all the fields!')</script>";
		exit();
		
	}
	
	else{
		
		
		//uploading images to its folder
		
		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");
		
		$insert_product = "insert into products (cat_id, brand_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_desc, status) 
		values ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','status')";
	
		$run_product = mysqli_query($con, $insert_product);
		
		if($run_product){
			
			echo "<script>alert('Product inserted successfully')</script>";
			
			echo "<script>window.open('index.php?insert_product','_self')</script>";
			
			
		}		
	
	
	}
	
}



?>


<?php } ?>