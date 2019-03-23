<!DOCTYPE html>
<html>
<head>
<title>Product Info :: BigGrocery</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<?php $this->load->view('site/css'); ?>
<?php $this->load->view('site/js'); ?>
</head>
<body>
<div class="header">
	<div class="container">
		<div class="logo">
			<?php $this->load->view('site/site_logo_tagline'); ?>
		</div>
		<div class="head-t">
			<?php $this->load->view('customer/customer_nav'); ?>	
		</div>
		<?php $this->load->view('site/site_nav'); ?>
	</div>			
</div>
<div class="single" style="padding-top: 5em;">
	<div class="container">
		<div class="single-top-main">
	   		<div class="col-md-5 single-top">
	   			<div class="single-w3agile">
					<div id="picture-frame">
						<img src="<?=base_url($data[0]['product_image']);?>" data-src="<?=base_url($data[0]['product_image_full']);?>" alt="" class="img-responsive"/>
					</div>
					<script src="<?=base_url('assets/js/jquery.zoomtoo.js');?>"></script>
					<script>
						$(function() {
							$("#picture-frame").zoomToo({
								magnify: 1
							});
						});
					</script>
				</div>
			</div>
			<div class="col-md-7 single-top-left ">
				<div class="single-right">
					<h3><?=$data[0]['product_name']?></h3>
					<div class="pr-single">
					  	<p class="reduced "><del>&#8377;<?=$data[0]['old_price']?></del>&#8377;<?=$data[0]['product_price']?></p>
					</div>
					<p class="in-pa" style="padding: 0;">
						<?=html_entity_decode($data[0]['product_desc'])?>
					</p>
					<hr>
			   		<div class="add add-3">
						<button class="btn btn-danger my-cart-btn my-cart-b" data-id="<?=$data[0]['product_id']?>" data-name="<?=$data[0]['product_name']?>" data-summary="<?=$data[0]['product_name']?>" data-price="<?=$data[0]['product_price']?>" data-quantity="1" data-image="<?=base_url($data[0]['product_image']);?>">Add to Cart</button>
					</div>
					<div class="clearfix"> </div>
				</div>
		 	</div>
		   	<div class="clearfix"> </div>
	    </div>	
	</div>
</div>

<div class="content-top offer-w3agile">
	<div class="container ">
		<div class="spec">
				<h3>Special Offers</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
		</div>
		<div class="con-w3l wthree-of">
			<div class="col-md-3 pro-1">
				<div class="col-m">
					<a href="#" data-toggle="modal" data-target="#myModal5" class="offer-img">
						<img src="images/of4.png" class="img-responsive" alt="">
						<div class="offer"><p><span>Offer</span></p></div>
					</a>
					<div class="mid-1">
						<div class="women">
							<h6><a href="single.html">Lays</a>(100 g)</h6>							
						</div>
						<div class="mid-2">
							<p ><label>$1.00</label><em class="item_price">$0.70</em></p>
							  <div class="block">
								<div class="starbox small ghosting"> </div>
							</div>
							<div class="clearfix"></div>
						</div>
							<div class="add">
						   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="5" data-name="Lays" data-summary="summary 5" data-price="0.70" data-quantity="1" data-image="images/of4.png">Add to Cart</button>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--footer-->
<div class="footer">
	<?php $this->load->view('site/site_footer'); ?>
</div>
<!-- //footer-->

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- cart function-->
<?php $this->load->view('cart/cart'); ?>
</body>
</html>
