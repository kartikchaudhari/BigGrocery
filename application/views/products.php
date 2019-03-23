<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta property="og:title" content="Vide" />
	<meta name="keywords" content="" />
	<?php $this->load->view('site/head'); ?>
</head>
<body>
<a href="offer.html"><img src="images/download.png" class="img-head" alt=""></a>
<div class="header">
	<div class="container">
		<div class="logo">
			<?php $this->load->view('site/site_logo_tagline'); ?>
		</div>
		<div class="head-t">
			<?php $this->load->view('customer/customer_nav'); ?>				
		</div>
		<!-- site_nav -->
		<?php $this->load->view('site/site_nav'); ?>
	</div>			
</div>
<!---->
<!--content-->
<div class="product" style="margin-top: -6.5%;">
	<div class="container">
		<div class="spec ">
			<h3><?=$data['sub_cat_name'];?></h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		
		<div class="con-w3l" style="padding-top: 20px;">
			<?php for ($i=0; $i <count($data['products']); $i++) { ?>
			<div id="p_d_<?=$data['products'][$i]['product_id']?>" class="col-md-3 pro-1">
				<div class="col-m">
					<?php
						if ($this->session->userdata('bg_sys_ss_user_id')) {
							$UserId=$this->session->userdata('bg_sys_ss_user_id');
							$ProductId=$data['products'][$i]['product_id'];
							isFavouriteProduct($ProductId,$UserId);
							echo checkFavourites(isFavouriteProduct($ProductId,$UserId),$ProductId);
						}else{
							echo checkFavourites(0,$data['products'][$i]['product_id']);
						}
					?>
					<a href="#" onclick="showProductDetailModel(<?=$data['products'][$i]['product_id']?>)" class="offer-img">
						<img src="<?=base_url($data['products'][$i]['product_image']);?>" class="img-responsive" alt="" style="height:150px;width: 150px;">
						<?=checkOffers($data['products'][$i]['has_offers'],$data['products'][$i]['product_id']);?></a>
					<div class="mid-1">
						<div class="row" style="margin-top:-5%;">
							<div class="col-4 pull-left" style="padding-left: 10px;"><?=isVegNonVeg($data['products'][$i]['veg_nonveg'])?></div>
						</div>
						<div class="row" style="margin-top:2%;padding-left: 5%;padding-right: 5%;">
							<div class="col-12">
								<h6><a href="<?=base_url('products/product_info/')?><?=$data['products'][$i]['product_id']?>"><?=$data['products'][$i]['product_name']?></a> (<?=$data['products'][$i]['product_weight']?>)</h6>
							</div>
						</div>
						<div class="mid-2">
							<p><strong>Price:</strong> <em class="item_price"><span>&#8377;</span><?=$data['products'][$i]['product_price']?></em>&nbsp;&nbsp;<strong>&middot;</strong>&nbsp;&nbsp;<?=isAvailableInStock($data['products'][$i]['product_status']);?>&nbsp;&nbsp;<strong>&middot;</strong></p>
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
						<div class="add">
							<button id="product_<?=$data['products'][$i]['product_id']?>"  class="btn btn-danger my-cart-btn my-cart-b" data-id="<?=$data['products'][$i]['product_id']?>" data-name="<?=$data['products'][$i]['product_name']?>" data-summary="summary 36" data-price="<?=$data['products'][$i]['product_price']?>" data-quantity="1" data-image="<?=base_url($data['products'][$i]['product_image']);?>" data-image-full="<?=base_url($data['products'][$i]['product_image_full']);?>">Add to Cart</button>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
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
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

<!-- cart function-->
	<?php $this->load->view('cart/cart'); ?>  
  <!-- product -->
	<div class="modal fade" id="ProductModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-info">
				<div class="modal-header">
					<a id="m_closer" href="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>						
				</div>
				<div class="modal-body modal-spa">
						<div class="col-md-5 span-2">
							<div class="item">
								<img id="p_image" class="img-thumbnail img-responsive" alt="">
							</div>
						</div>
						<div class="col-md-7 span-1 ">
							<h3><span id="p_name"></span><span id="product_weight"></span></h3>
							<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
							<div class="price_single">
							  <span id="p_price" class="reducedfrom">$</span>
							
							 <div class="clearfix"></div>
							</div>
							<h4 class="quick">Quick Overview:</h4>
							<p id="p_desc" class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
							 <div class="add-to">
								   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="24" data-name="Wheat" data-summary="summary 24" data-price="1.50" data-quantity="1" data-image="images/of24.png">Add to Cart</button>
								</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<script type="text/javascript">
		$(document).ready(function(){
			$(".btnWish").on('click',function(){
			    $.post("<?=base_url('wishlist/AddToWishList');?>",
			    {
			        product_id: $(this).attr("data-pid")
			    },
			    function(data, status){
			        alert(data);
			    });
			});
		}); 
	</script>
	<script type="text/javascript">
		function showProductDetailModel(product_id){
			var btnId="#product_"+product_id;
			var hrf="#p_d_"+product_id;
				$("#p_id").text($(btnId).attr('data-id'));
				$("#p_name").text($(btnId).attr('data-name'));
				$("#p_desc").text($(btnId).attr('data-summary'));
				$("#p_price").text($(btnId).attr('data-price'));
				$("#p_image").attr('src',$(btnId).attr('data-image-full'));
				$("#m_closer").attr('href',hrf);
				$("#ProductModel").modal();
			return false;
		}
	</script>		
</body>
</html>