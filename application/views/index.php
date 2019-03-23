<?php $this->load->helper('offer'); ?>
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
	      <ol class="carousel-indicators">
	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel" data-slide-to="1"></li>
	        <li data-target="#myCarousel" data-slide-to="2"></li>
	      </ol>
	      <div class="carousel-inner" role="listbox">
	        <div class="item active">
	         <a href="kitchen.html"> <img class="first-slide" src="<?=site_url('assets/images/ba.jpg');?>" alt="First slide"></a>
	       
	        </div>
	        <div class="item">
	         <a href="care.html"> <img class="second-slide " src="<?=site_url('assets/images/ba1.jpg');?>" alt="Second slide"></a>
	         
	        </div>
	        <div class="item">
	          <a href="hold.html"><img class="third-slide " src="<?=site_url('assets/images/ba2.jpg');?>" alt="Third slide"></a>
	        </div>
	      </div>
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
					<div class="tab-pane active text-style" id="tab1">
						<div class=" con-w3l">
							<div class="col-md-3 m-wthree">
								<div class="col-m">								
									<a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
										<img src="<?=site_url('assets/images/of.png');?>" class="img-responsive" alt="">
										<div class="offer"><p><span>Offer</span></p></div>
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.html">Moong</a>(1 kg)</h6>							
										</div>
										<div class="mid-2">
											<p ><label>$2.00</label><em class="item_price">$1.50</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="<?=site_url('assets/images/of.png');?>">Add to Cart</button>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-md-3 m-wthree">
								<div class="col-m">
									<a href="#" data-toggle="modal" data-target="#myModal2" class="offer-img">
										<img src="<?=site_url('assets/images/of1.png');?>" class="img-responsive" alt="">
										<div class="offer"><p><span>Offer</span></p></div>
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.html">Sunflower Oil</a>(5 kg)</h6>							
										</div>
										<div class="mid-2">
											<p ><label>$10.00</label><em class="item_price">$9.00</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
												<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="2" data-name="Sunflower Oil" data-summary="summary 2" data-price="9.00" data-quantity="1" data-image="<?=site_url('assets/images/of1.png');?>">Add to Cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 m-wthree">
								<div class="col-m">
									<a href="#" data-toggle="modal" data-target="#myModal3" class="offer-img">
										<img src="<?=site_url('assets/images/of2.png');?>" class="img-responsive" alt="">
										<div class="offer"><p><span>Offer</span></p></div>
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.html">Kabuli Chana</a>(1 kg)</h6>							
										</div>
										<div class="mid-2">
											<p ><label>$3.00</label><em class="item_price">$2.00</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
											<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="<?=site_url('assets/images/of2.png');?>">Add to Cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 m-wthree">
								<div class="col-m">
									<a href="#" data-toggle="modal" data-target="#myModal4" class="offer-img">
										<img src="<?=site_url('assets/images/of3.png');?>" class="img-responsive" alt="">
										<div class="offer"><p><span>Offer</span></p></div>
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.html">Soya Chunks</a>(1 kg)</h6>							
										</div>
										<div class="mid-2">
											<p ><label>$4.00</label><em class="item_price">$3.50</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
											<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="4" data-name="Soya Chunks" data-summary="summary 4" data-price="3.50" data-quantity="1" data-image="<?=site_url('assets/images/of3.png');?>">Add to Cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						 </div>
					</div>
					<div class="tab-pane  text-style" id="tab2">
						<div class=" con-w3l">
							<?=snacksOffer(); ?>
							<div class="clearfix"></div>
						</div>		  
					</div>
					<div class="tab-pane  text-style" id="tab3">
						<div class=" con-w3l">
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