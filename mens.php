<!DOCTYPE html>
<html>
<head>
<title>Mens | The Enginr Dot</title>
<!-- for-mobile-apps -->
<link rel="shortcut icon" type="image/x-icon" href="images/logotab.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="js/jquery.easing.min.js"></script>
<!-- timer -->
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //timer -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
<body>
<!-- header -->
<?php include('menu.php'); ?>
<!-- //banner-top -->
<!-- banner -->
<div class="page-head animated wow zoomIn" data-wow-delay=".5s">
	<div class="container">
		<h3>Men's Wear</h3>
	</div>
</div>
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
	<div class="container">
		<div class="col-md-4 products-left animated wow zoomIn" data-wow-delay=".5s">
			<div class="filter-price">
				<h3>Filter By Price</h3>
					<ul class="dropdown-menu6">
						<li>                
							<div id="slider-range"></div>							
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>			
					</ul>
							<!---->
							<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider(    {
										range: true,
										min: 0,
										max: 10000,
										values: [ 0, 8000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "Rs." + ui.values[ 0 ] + " - Rs." + ui.values[ 1 ] );
                                load_product(ui.values[0],ui.values[1]);
				                }
							 });
//                            load_product();
                            function load_product(minimum_range, maximum_range){
//                        alert(minimum_range);
                             $.ajax({
                                    url:"fetch.php",
                                    method:"GET",
                                    data:{minimum_range:minimum_range, maximum_range:maximum_range},
                                    success:function(data)
                                    {
                                        $('#single-pro').fadeIn('slow').html(data);
                                    }
		                      });   
                            }
							$( "#amount" ).val( "Rs." + $( "#slider-range" ).slider( "values", 0 ) + " - Rs." + $( "#slider-range" ).slider( "values", 1 ) );

                                
                                
							});//]]>  

							</script>
						<script type="text/javascript" src="js/jquery-ui.js"></script>
					 <!---->
			</div>
	<!--		<div class="css-treeview">
				<h4>Categories</h4>
				<ul class="tree-list-pad">
					<li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><span></span>Men's Wear</label>
								<ul>
									<li><a href="mens">Top Wear</a></li>
									<li><a href="mens">Bottom Wear</a></li>
                                    <li><a href="mens">Foot Wear</a></li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
								</ul>
							</li>
				</ul>

			</div>-->

			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right animated wow zoomIn" data-wow-delay=".5s">
			
			<div class="sort-grid animated wow zoomIn" data-wow-delay=".5s">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="default">Default</option>
						<option value="nameasc">Name(A - Z)</option> 
						<option value="namedesc">Name(Z - A)</option>
						<option value="priceasc">Price(High - Low)</option>
						<option value="pricedesc">Price(Low - High)</option>	
					</select>
					<div class="clearfix"></div>
				</div>
				<script>
                    function change_country(value){
//                        alert(Value);
                        var $divs = $('div.product-men');
                        if(value == 'default'){
//                            alert("Entered default");
                            var default1 = $divs.sort(function(a,b){
                                return $(a).find(".item-info-product h4 a").text() > $(b).find(".item-info-product h4 a").text();
                        });
//                            console.log(default1);
                            $('#single-pro').html(default1);
                            
                        }
                        else if(value == 'nameasc'){
                             var nameasc = $divs.sort(function(a,b){
                                return $(a).find(".item-info-product h4 a").text() > $(b).find(".item-info-product h4 a").text();
                        });
//                            console.log(default1);
                            $('#single-pro').html(nameasc);
                        }
                        else if(value == 'namedesc'){
                             var default1 = $divs.sort(function(a,b){
                                return $(a).find(".item-info-product h4 a").text() < $(b).find(".item-info-product h4 a").text();
                        });
//                            console.log(default1);
                            $('#single-pro').html(default1);
                        }
                        else if(value == 'priceasc'){
                             var priceasc = $divs.sort(function(a,b){
                                return $(a).find(".item-info-product .info-product-price span").text() > $(b).find(".item-info-product .info-product-price span").text();
                        });
//                            console.log(default1);
                            $('#single-pro').html(priceasc);
                        }
                        else if(value == 'pricedesc'){
                             var pricedesc = $divs.sort(function(a,b){
                                return $(a).find(".item-info-product .info-product-price span").text() < $(b).find(".item-info-product .info-product-price span").text();
                        });
//                            console.log(default1);
                            $('#single-pro').html(pricedesc);
                        }
                    }
                </script>
				
<!--
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option> 
						<option value="null">28</option>					
						<option value="null">35</option>								
					</select>
					<div class="clearfix"></div>
				</div>
-->
				<div class="clearfix"></div>
			</div>
<!--
				<div class="col-md-4 product-men no-pad-men" style="border:double;">
					<div class="men-pro-item simpleCart_shelfItem animated wow zoomIn" data-wow-delay=".5s">
						<div class="men-thumb-item">
							<img src="images/ep2.png" alt="" class="pro-image-front">
							<img src="images/ep2.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="single.html">Watches</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem animated wow zoomIn" data-wow-delay=".5s">
						<div class="men-thumb-item">
							<img src="images/a2.png" alt="" class="pro-image-front">
							<img src="images/a2.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="single.html">Blazers</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem animated wow zoomIn" data-wow-delay=".5s">
						<div class="men-thumb-item">
							<img src="images/mw2.png" alt="" class="pro-image-front">
							<img src="images/mw2.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="single.html">Shirts</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
				
-->
				<div class="clearfix"></div>
		</div>
			<div class="col-md-12 products-right animated wow zoomIn" data-wow-delay=".5s">
			<div class="men-wear-top animated wow zoomIn" data-wow-delay=".5s">
				<script src="js/responsiveslides.min.js"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<img class="img-responsive" src="images/men11.jpeg" alt=" " width="100%"/>
						</li>
						<li>
							<img class="img-responsive" src="images/men12.jpeg" alt=" " width="100%"/>
						</li>
						<li>
							<img class="img-responsive" src="images/men13.jpeg" alt=" " width="100%"/>
						</li>
						<li>
							<img class="img-responsive" src="images/men14.jpeg" alt=" " width="100%"/>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<!--<div class="men-wear-bottom">
				<div class="col-sm-4 men-wear-left animated wow zoomIn" data-wow-delay=".5s">
					<img class="img-responsive" src="images/men15.jpg" alt=" " />
				</div>
				<div class="col-sm-8 men-wear-right animated wow ZoomIn" data-wow-delay=".5s">
					<h4>Exclusive Men's Collections</h4>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
					accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae 
					ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
					explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
					odit aut fugit. </p>
				</div>
				<div class="clearfix"></div>
			</div>-->
<!--
				<div class="col-md-4 product-men no-pad-men" style="border:double;">
					<div class="men-pro-item simpleCart_shelfItem animated wow zoomIn" data-wow-delay=".5s">
						<div class="men-thumb-item">
							<img src="images/ep2.png" alt="" class="pro-image-front">
							<img src="images/ep2.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="single.html">Watches</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem animated wow zoomIn" data-wow-delay=".5s">
						<div class="men-thumb-item">
							<img src="images/a2.png" alt="" class="pro-image-front">
							<img src="images/a2.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="single.html">Blazers</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem animated wow zoomIn" data-wow-delay=".5s">
						<div class="men-thumb-item">
							<img src="images/mw2.png" alt="" class="pro-image-front">
							<img src="images/mw2.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="single.html">Shirts</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
				
-->
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<?php
//        include_once("connect.php");
//        $query1_1 = mysqli_query($con,"select * ")
        ?>
		<div class="single-pro" id="single-pro">
			
<!--
			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem animated wow slideInLeft" data-wow-delay=".5s">
					<div class="men-thumb-item">
						<img src="images/a8.png" alt="" class="pro-image-front">
						<img src="images/a8.png" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="single.html" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>				
					</div>
					<div class="item-info-product ">
						<h4><a href="single.html">Blazers</a></h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem animated wow slideInLeft" data-wow-delay=".5s">
					<div class="men-thumb-item">
						<img src="images/mw1.png" alt="" class="pro-image-front">
						<img src="images/mw1.png" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="single.html" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>				
					</div>
					<div class="item-info-product ">
						<h4><a href="single.html">Sandals</a></h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
					<div class="men-thumb-item">
						<img src="images/ep3.png" alt="" class="pro-image-front">
						<img src="images/ep3.png" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="single.html" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>				
					</div>
					<div class="item-info-product ">
						<h4><a href="single.html">Watches</a></h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
					<div class="men-thumb-item">
						<img src="images/mw3.png" alt="" class="pro-image-front">
						<img src="images/mw3.png" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="single.html" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>				
					</div>
					<div class="item-info-product ">
						<h4><a href="single.html">Shoes</a></h4>
						<div class="info-product-price">
							<span class="item_price">$45.99</span>
							<del>$69.71</del>
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
					</div>
				</div>
			</div>
			<div class="col-md-3 product-men yes-marg">
							<div class="men-pro-item simpleCart_shelfItem animated wow slideInLeft" data-wow-delay=".5s">
								<div class="men-thumb-item">
									<img src="images/g3.png" alt="" class="pro-image-front">
									<img src="images/g3.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">Shirts</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
						<div class="col-md-3 product-men yes-marg">
							<div class="men-pro-item simpleCart_shelfItem animated wow slideInLeft" data-wow-delay=".5s">
								<div class="men-thumb-item">
									<img src="images/ep4.png" alt="" class="pro-image-front">
									<img src="images/ep4.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">Watches</a></h4>
									<div class="info-product-price">
										<span class="item_price">$119.99</span>
										<del>$150.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
			<div class="col-md-3 product-men yes-marg">
							<div class="men-pro-item simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
								<div class="men-thumb-item">
									<img src="images/mw2.png" alt="" class="pro-image-front">
									<img src="images/mw2.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">T shirts</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
			<div class="col-md-3 product-men yes-marg">
							<div class="men-pro-item simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
								<div class="men-thumb-item">
									<img src="images/g2.png" alt="" class="pro-image-front">
									<img src="images/g2.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html"> Shirts</a></h4>
									<div class="info-product-price">
										<span class="item_price">$45.99</span>
										<del>$69.71</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
-->
        <?php
            
            getpromens();
            
        ?>
			<div class="clearfix"></div>
		</div>
		<div class="pagination-grid text-right animated wow zoomIn" data-wow-delay=".5s">
<!--
			<ul class="pagination paging">
				<li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
				<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
			</ul>
-->
		</div>
	</div>
</div>	
<!-- //mens -->
<!-- //product-nav -->
<div class="coupons">
	<div class="container">
		<div class="coupons-grids text-center animated wow zoomIn" data-wow-delay=".5s">
			<div class="col-md-3 coupons-gd">
				<h3>Buy your product in a simple way</h3>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<h4>LOGIN TO YOUR ACCOUNT</h4>
				<!--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>-->
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<h4>SELECT YOUR ITEM</h4>
				<!--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>-->
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
				<h4>MAKE PAYMENT</h4>
				<!--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>-->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- footer -->
<?php include('footer.php'); ?>
<!-- //footer -->
<!-- login -->
	<!-- //login -->
</body>
</html>
<?php 
if(isset($_GET["add_cart"])){
//    echo "hello world";
    echo cart();
}
?>