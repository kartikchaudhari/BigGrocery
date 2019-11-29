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
	    	<div class="row">
				<div class="col-md-12">
					<div class="carousel-inner" role="listbox">
			      		<?=make_slides();?>
			      	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		     			<span class="glyphicon glyphicon-chevron-left"></span>
		     			<span class="sr-only">Previous</span>
		    		</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
				    	<span class="glyphicon glyphicon-chevron-right"></span>
				    	<span class="sr-only">Next</span>
		    		</a>
			      	</div>
				</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-12">
	    			<div class="col-md-4 col-md-offset-3" style="text-align: center;">
			      		<ol class="carousel-indicators">
				        	<?=make_slide_indicators();?>
			      		</ol>
			      	</div>
	    		</div>
	    	</div>
	    </div>
	<!-- /.carousel -->

		<div class="spec" style="margin-top: 7em;">
			<h3>Special Offers</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
			<div class="tab-head ">
				<nav class="nav-sidebar">
					<ul class="nav tabs" style="margin-bottom: 1em;">
					  <li class="active"><a href="#tab1" data-toggle="tab">Staples</a></li>
					  <li class=""><a href="#tab2" data-toggle="tab">Snacks</a></li> 
					  <li class=""><a href="#tab3" data-toggle="tab">Fruits & Vegetables</a></li>  
					  <li class=""><a href="#tab4" data-toggle="tab">Breakfast & Cereal</a></li>
					</ul>
				</nav>
				<div class=" tab-content tab-content-t" >
					<div class="row" style="margin-bottom: 1em;">
						<div class="col-md-12">
							<div class="col-md-1 col-sm-2 col-lg-1 col-xs-1 pull-right">
								<a class="btn btn-primary btn-xs" href="#productCarasoule" data-slide="prev">
							    	<span class="glyphicon glyphicon-chevron-left"></span>
							    	<span class="sr-only">Previous</span>
							  	</a>

							  	<a class="btn btn-primary btn-xs" href="#productCarasoule" data-slide="next">
							    	<span class="glyphicon glyphicon-chevron-right"></span>
							    	<span class="sr-only">Next</span>
							    </a>
							</div>
						</div>
					</div>
					<!-- staples -->
					<div class="tab-pane active text-style" id="tab1">
						<div id="productCarasoule" class="carousel slide" data-ride="carousel" >
							<!-- bottom slider Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#productCarasoule" data-slide-to="0" class="active"></li>
							    <li data-target="#productCarasoule" data-slide-to="1"></li>
							    <li data-target="#productCarasoule" data-slide-to="2"></li>
							</ol>
							<!--./bottom slider indictors -->

							<!-- offer products carasoul with tabs-->
							<?php
								$products = staplesOffer(); // Products retreived from database

								$is_active = true; // Only true for the first iteration
								$i = 0;
							?>
							<div class="carousel-inner">
								<?php foreach($products as $p):?>
								<?php if ($i % 1 == 0):?>
								    <div class="item<?php if ($is_active) echo ' active'?>">
								<?php endif?>
									<?=fruitsVegOffer();?>
								<?php if (($i+1) % 1 == 0 || $i == count($products)-1):?>
								    </div>
								<?php endif?>
								
								<?php
									$i++;
									if ($is_active) $is_active = false;
								endforeach;
								?>
							</div>
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
						<h3>Cooking <span>Oil</<span></span>></h3>
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
<?php 
	$data=array();
	
	$this->load->view('site/site_footer'); 
?>
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
		var post_data = {'search_data': input_data,'<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'};
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