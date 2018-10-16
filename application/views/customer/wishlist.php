<!DOCTYPE html>
<html>
<head>
<title>Wish List :: BirGrocery</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="" />

<!-- site css and js header -->
	<?php $this->load->view('customer/head'); ?>
<!--//site css and js header -->
</head>
<body>
<!-- offer -->
<a href="offer.html"><img src="<?=base_url('assets/images/download.png');?>" class="img-head" alt=""></a>
<div class="header">
	<div class="container">
		<div class="logo">
			<?php $this->load->view('site/site_logo_tagline'); ?>
		</div>
		<div class="head-t">
			<?php $this->load->view('customer/customer_nav'); ?>
		</div>
		<!-- navbar_main -->
			<?php $this->load->view('site/site_nav'); ?>
		<!-- navbar_main ends -->
	</div>			
</div>
  <!---->
<!-- content -->
<div class="check-out">	 
	<div class="container" style="margin-top: -3%;">	 
		<div class="spec">
			<h3>Wishlist</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		<script>
			$(document).ready(function(c) {
				$('.close1').on('click', function(c){
					$('.cross').fadeOut('slow', function(c){
						$('.cross').remove();
					});
				});	  
			});
	    </script>
			
		<table class="table">
		 	<tr>
				<th class="t-head head-it ">Products</th>
				<th class="t-head">Price</th>
				<th class="t-head">Quantity</th>
				<th class="t-head">Actions</th>
			</tr>		
			<?php if(count($wishlist_products)>0){ for($i=1;$i<count($wishlist_products);$i++){ ?>
			<tr class="cross<?=$wishlist_products[$i]['product_id'];?>">
				<td class="ring-in t-data">
					<a href="<?=base_url('products/product_info/'.$wishlist_products[$i]['product_id'])?>" class="at-in">
						<img src="<?=base_url($wishlist_products[$i]['product_image']);?>" height="70px" width="70px" class="img-responsive" alt="">
					</a>
					<div class="sed">
						<a href="<?=base_url('products/product_info/'.$wishlist_products[$i]['product_id'])?>"><h5><?=$wishlist_products[$i]['product_name']?></h5></a>
					</div>
					<div class="clearfix"></div>
				</td>
				<td class="t-data">$<?=$wishlist_products[$i]['product_price']?></td>
				<td class="t-data">
					<div class="quantity"> 
						<div class="quantity-select">            
							<div class="entry value-minus">&nbsp;</div>
								<div class="entry value"><span class="span-1">1</span></div>									
							<div class="entry value-plus active">&nbsp;</div>
						</div>
					</div>
				</td>
				<td class="t-data t-w3l">
					<button class="btn btn-success my-cart-btn my-cart-b" title="Add to Cart" data-id="<?=$wishlist_products[$i]['product_id']?>" data-name="<?=$wishlist_products[$i]['product_name']?>" data-summary="<?=$wishlist_products[$i]['product_name']?>" data-price="<?=$wishlist_products[$i]['product_price']?>" data-quantity="1" data-image="<?=base_url($wishlist_products[$i]['product_image'])?>">Add To Cart</button>
					&nbsp;<strong>&middot;</strong>&nbsp;
					<button class="btn btn-danger" title="Remove from Wishlists" onclick="removeFromWishList(<?=$wishlist_products[$i]['product_id'];?>);">Remove from Wishlist</button>
				</td>
			</tr>
			<?php 
					} 
				}
			 	else{
			 ?>
			 <tr>
			 	<td colspan="4" align="center"><span style="font-size: 16px;">You have not added any product to your wishlist..</span></td>
			 </tr>
			 <?php 
			 	}
			?>
		</table>
	</div>
</div>
		 				
<!--quantity-->
	<script>
		$('.value-plus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
			divUpd.text(newVal);

			//increment quantity in cart
			var $row=$(this).closest('tr');
			$row.find(".my-cart-btn").attr('data-quantity',newVal);

		});

		$('.value-minus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
			if(newVal>=1) divUpd.text(newVal);

			//decrease quantity in cart
			var $row=$(this).closest('tr');
			$row.find(".my-cart-btn").attr('data-quantity',newVal);

		});
	</script>
<!--quantity-->
<script type="text/javascript">
	function removeFromWishList(p_id){
		
		var class_attr='.cross'+p_id;

		$(class_attr).fadeOut('slow', function(c){
			$(class_attr).remove();
		});

		$.post('<?=base_url('wishlist/removeFromWishList');?>', 
			{product_id: p_id},
		function(data) {
		 	alert(data);
		});
	}
</script>
			

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
<!-- for bootstrap working -->
		<script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
<!-- //for bootstrap working -->
<?php $this->load->view('cart/cart');?>
</body>
</html>