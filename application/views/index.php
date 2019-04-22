<?php $this->load->helper(array('offer','site')); ?>
<!DOCTYPE html>
<html>
<head>
<title> Home :: BigGrocery</title>
<?php $this->load->view('site/favicon'); ?>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="" />
<?php $this->load->view('site/css'); ?>
<?php $this->load->view('site/js'); ?>
</head>
<body>
<div class="header">
	<div class="container">
		<div class="logo">
			<?php $this->load->view('site/site_logo_tagline'); ?>
		</div>
		
		<!-- header_user_functions-->
		<div class="head-t">
			<?php $this->load->view('customer/customer_nav'); ?>	
		</div>
		<!-- header_user_functions ends-->
		
		<!-- search bar -->
		<?php $this->load->view('search'); ?>
		<!--/search bar -->

		<!-- navbar_main -->
		<?php $this->load->view('site/site_nav'); ?>
		<!-- navbar_main ends -->

		<div class="row">
			<div class="col-md-10">

			</div>
		</div>
	</div>			
</div>

<!--content-->
<div class="content-top" style="margin-top: -3%;">
	<div class="container ">
	<!-- Carousel-->
	    <div id="myCarousel" class="carousel slide" data-ride="carousel">
	      <!-- Indicators -->
	      <div class="col-md-offset-0">
	      	<ol class="carousel-indicators">
		        <?=make_slide_indicators();?>
	      	</ol>
	      </div>
	      <div class="carousel-inner" role="listbox">
	      	<?=make_slides();?>
	      </div>
	      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#myCarousel" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>
	    </div>
	<!-- /.carousel -->

		<div class="spec" style="margin-top: 5%;">
			<h3>Special Offers</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
			<div class="tab-head ">
				<nav class="nav-sidebar">
					<ul class="nav tabs ">
					  <li class="active"><a href="#tab1" data-toggle="tab">Staples</a></li>
					  <li class=""><a href="#tab2" data-toggle="tab">Snacks</a></li> 
					  <li class=""><a href="#tab3" data-toggle="tab">Fruits & Vegetables</a></li>  
					  <li class=""><a href="#tab4" data-toggle="tab">Breakfast & Cereal</a></li>
					</ul>
				</nav>
				<div class=" tab-content tab-content-t ">
					<!-- staples -->
					<div class="tab-pane active text-style" id="tab1">
							<div id="productCarasoule" class="carousel slide" data-ride="carousel">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
							    <li data-target="#productCarasoule" data-slide-to="0" class="active"></li>
							    <li data-target="#productCarasoule" data-slide-to="1"></li>
							    <li data-target="#productCarasoule" data-slide-to="2"></li>
							  </ol>

							  <!-- Wrapper for slides -->
								<div class="carousel-inner">
									<?php
										for ($i=0; $i <4; $i++) { 
											if ($i==0) {
												echo '<div class="item active">
							    						<div class="row">';
											}
											else{
												echo '<div class="item">
							    						<div class="row">';
											}
											for ($j=0; $j <4; $j++) { 
												echo '<div class="col-md-3">
												<div class="panel panel-default">
													<div class="panel-body">
														<div class="table-responsive">
															<table class="table">
																<tr>
																	<td>
																		<a href="#" onclick="showProductDetailModel(1)" class="offer-img">
																			<img src="http://127.0.0.1/BigGrocery/product_images/thumb/cocacola_PNG21.png" class="img-responsive" alt="" style="height:150px;width: 150px;">
																			<img style="position: absolute;top: 0;right: -15px;padding: 2px;" src="http://127.0.0.1/BigGrocery/assets/images/output-onlinepngtools.png"  height="22px">
																			</a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<div class="col-4 pull-left" style="padding-left: 10px;">
																				<img src="http://127.0.0.1/BigGrocery/assets/images/veg.png" title="Veg Product" height="18px" width="18px">
																					
																					<h6 style="margin-top:6px;"><a href="http://127.0.0.1/BigGrocery/products/product_info/1">CocaCola Bottle</a> (1.5 ml)</h6>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<div class="mid-2">

																			<div class="block">
																				<div class="starbox small ghosting">
																					<div class="positioner">
																						<div class="stars">
																							<div class="ghost" style="width: 42.5px;">
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="clearfix"></div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<div class="add">
																			<button id="product_1" class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="CocaCola Bottle" data-summary="summary 36" data-price="63" data-quantity="1" data-image="http://127.0.0.1/BigGrocery/product_images/thumb/cocacola_PNG21.png" data-image-full="http://127.0.0.1/BigGrocery/product_images/full/sprite.jpg">Add to Cart</button>
																		</div>
																	</td>
																</tr>
															</table>
														</div>													
													</div>
												</div>
											</div>';			
											}
											echo "</div>
											</div>";
										}
									?>
							  </div>
							  <!-- Left and right controls -->
							  <a class="left pull-left" href="#productCarasoule" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="right pull-right" href="#productCarasoule" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
						
						


					</div>
					<!--/staples -->
					<div class="tab-pane  text-style" id="tab2">
						<div class=" con-w3l">
							<?=snacksOffer(); ?>
							<div class="clearfix"></div>
						</div>		  
					</div>
					<div class="tab-pane text-style" id="tab3">
						<div id="flexiselDemo1" class="con-w3l">
							<?=fruitsVegOffer();?>
							<div class="clearfix"></div>
						 </div>		  
					</div>
					<div class="tab-pane  text-style" id="tab4">
						<div class=" con-w3l">
							<?=breakCerelOffers();?>
							<div class="clearfix"></div>
						 </div>		  
					</div>
				</div>
			</div>
	</div>
	</div>
	</div>

<!--content-->
<div class="content-mid">
	<div class="container">
		<div class="col-md-4 m-w3ls">
			<div class="col-md1 ">
				<a href="kitchen.html">
					<img src="<?=site_url('assets/images/co1.jpg');?>" class="img-responsive img" alt="">
					<div class="big-sa">
						<h6>New Collections</h6>
						<h3>Season<span>ing </span></h3>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority </p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls1">
			<div class="col-md ">
				<a href="hold.html">
					<img src="<?=site_url('assets/images/co.jpg');?>" class="img-responsive img" alt="">
					<div class="big-sale">
						<div class="big-sale1">
							<h3>Big <span>Sale</span></h3>
							<p>It is a long established fact that a reader </p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls">
			<div class="col-md2 ">
				<a href="kitchen.html">
					<img src="<?=site_url('assets/images/co2.jpg');?>" class="img-responsive img1" alt="">
					<div class="big-sale2">
						<h3>Cooking <span>Oil</span></h3>
						<p>It is a long established fact that a reader </p>		
					</div>
				</a>
			</div>
			<div class="col-md3 ">
				<a href="hold.html">
					<img src="<?=site_url('assets/images/co3.jpg');?>" class="img-responsive img1" alt="">
					<div class="big-sale3">
						<h3>Vegeta<span>bles</span></h3>
						<p>It is a long established fact that a reader </p>
					</div>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--content-->

<!--footer-->
<?php $this->load->view('site/site_footer'); ?>
<!-- //footer-->

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- cart function -->
<?php $this->load->view('cart/cart'); ?>
<!--/cart function-->
<!-- live search-->
<script type="text/javascript">
function ajaxSearch()
{
  var input_data = $('#search_data').val();
	if (input_data.length === 0){
        $('.instant-results').hide();
    }
    else{
		var post_data = {'search_data': input_data};
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>products/doSearchProduct/",
            data: post_data,
            success: function (data) {
				$(".instant-results").fadeIn('fast').css('height', 'auto');
				$(".instant-results").html(data);
            }
         });

     }
 }
</script>
<!--/live search-->

</body>
</html>