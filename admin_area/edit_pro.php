<style>
    .right{
        height:auto;
    }
    .left{
        height:auto;
    }
</style>
<?php

include("includes/db.php");

//getting the specific product from table
if(isset($_GET['edit_pro'])){
	
	$edit_id = $_GET['edit_pro'];	

	$get_edit = "select * from products where product_id='$edit_id'";
	
	$run_edit = mysqli_query($con, $get_edit);
	
	$row_edit = mysqli_fetch_array($run_edit);
	
	$update_id = $row_edit['product_id'];
	
	$p_title = $row_edit['product_title'];
	
	$cat_id = $row_edit['cat_id'];
	
	$brand_id = $row_edit['brand_id'];
	
	$p_image1 = $row_edit['product_img1'];
	
	$p_image2 = $row_edit['product_img2'];
	
	$p_image3 = $row_edit['product_img3'];
	
	$p_price = $row_edit['product_price'];
	
	$p_desc = $row_edit['product_desc'];
	
	$p_keywords = $row_edit['product_keywords'];
	
	
	
	
	
	}

	//getting the product relevant category
	
	$get_cat = "select * from categories where cat_id='$cat_id'";
	
	$run_cat = mysqli_query($con, $get_cat);

	$cat_row = mysqli_fetch_array($run_cat);
	
	$cat_edit_title = $cat_row['cat_title'];
	
	//getting the exact brand for this product
	
	$get_brand = "select * from brands where brand_id='$brand_id'";
	
	$run_brand = mysqli_query($con, $get_brand);

	$brand_row = mysqli_fetch_array($run_brand);
	
	$brand_edit_title = $brand_row['brand_title'];
	
	
?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<h1 class="text-center">Update or Edit product</h1>
<div class="container" style="width:100%;padding: 10px 50px;">
<form method= "post" action="" enctype="multipart/form-data">

	<div class="form-group">
	    <label>Product Title</label>
	    <input type="text" name="product_title" size="50" value="<?php echo $p_title; ?>" class="form-control" />
	</div>
	<div class="form-group">
	    <label>Product Category</label>
	    <select name="product_cat" class="form-control">
	
	<option value="<?php echo $cat_id; ?>"><?php echo $cat_edit_title; ?></option>
	
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
	    	<select name="product_brand" class="form-control">
	
	<option value="<?php echo $brand_id; ?>"><?php echo $brand_edit_title; ?></option>
	
	
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
	    <input type="file" name="product_img1" class="form-control">
	    <img src="product_images/<?php echo $p_image1; ?>" width="80" height="80" />
	</div>
	<div class="form-group">
	    <label for="">Product Image 2</label>
	    <input type="file" name="product_img2" class="form-control">
	    <?php if($p_image2 != '') {
        ?>
	    <img src="product_images/<?php echo $p_image2; ?>" width="100" height="80" />
	    <?php } else { ?>
	    <img src="product_images/noimage.png" width="100" height="80" />
	    <?php } ?>
	</div>
	<div class="form-group">
	      <label for="">Product Image 3</label>
	    <input type="file" name="product_img3" class="form-control">
	    <?php if($p_image3 != '') {
        ?>
	    <img src="product_images/<?php echo $p_image3; ?>" width="100" height="80" />
	    <?php } else { ?>
	    <img src="product_images/noimage.png" width="100" height="80" />
	    <?php } ?>
	</div>
	<div class="form-group">
	    <label for="">Product Price</label>
	    <input type="text" name="product_price" value="<?php echo $p_price; ?>" class="form-control" />
	</div>
	<div class="form-group">
	    <label for="">Product Description</label>
	    <textarea name="product_desc" cols="35" rows="10" class="form-control"><?php echo $p_desc; ?></textarea>
	</div>
	<div class="form-group">
	    <label for="">Product Keywords</label>
	    <input type="text" name="product_keywords" size="50" value="<?php echo $p_keywords; ?>" class="form-control"/>
	</div>
	<div class="form-group">
	    <input type="submit" name="update_product" value="Update Product" class="btn btn-default"/>
	</div>
	
</form>
</div>
<?php

if(isset($_POST['update_product'])){
	
	
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
	
	if($product_title=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' Or $product_keywords==''){
		
		echo "<script>alert('please fill all the fields!')</script>";
		exit();
        
	}
	
	else{
		
		
		//uploading images to its folder
		if($product_img1 != '' || $product_img2 != '' || $product_img3 != ''){
		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");
		
		$update_product = "update products set cat_id='$product_cat', brand_id = '$product_brand', date=NOW(), product_title = '$product_title', product_img1= '$product_img1', product_img2='$product_img2', product_img3='$product_img3', product_price='$product_price', product_desc='$product_desc', product_keywords='$product_keywords' where product_id='$update_id'";
        }
        else{
            $update_product = "update products set cat_id='$product_cat', brand_id = '$product_brand', date=NOW(), product_title = '$product_title', product_price='$product_price', product_desc='$product_desc', product_keywords='$product_keywords' where product_id='$update_id'";
        }
		$run_update = mysqli_query($con, $update_product);
		
		if($run_update){
			
			echo "<script>alert('Product updated successfully')</script>";
			
			echo "<script>window.open('index.php?view_products','_self')</script>";
			
			
		}		
	
	
	}
	
}



?>