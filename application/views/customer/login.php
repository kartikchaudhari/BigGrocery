<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Big store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<!-- for-mobile-apps -->
<?php $this->load->view('customer/head'); ?>
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
<!--login-->
	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Login</h3>
					<form action="<?=base_url('user/login_user')?>" method="post">
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" placeholder="Enter email or phone " name="uname" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="password" required="">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Login">
					</form>
				</div>
				<div class="forg">
					<a href="#" class="forg-left">Forgot Password</a>
					<a href="register.html" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>
<!--footer-->
<div class="footer">
	<?php $this->load->view('site/site_footer');?>
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

<!-- for bootstrap working -->
		<script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="<?=base_url('assets/js/jquery.mycart.js');?>"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>

</body>
</html>