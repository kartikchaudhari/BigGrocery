<!DOCTYPE html>
<html>
<head>
<title> Register :: BigGrocery</title>
<?php $this->load->view('customer/head'); ?>
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

<!-- flas message --> 
<div class="row" style="margin-top: 2%;margin-bottom: -5%;padding: 0px;">
	<div class="col-md-4 col-md-offset-4">
 		<?php if($this->session->flashdata('bg_sys_msg')){echo $this->session->flashdata('bg_sys_msg');} ?>
	</div>
</div>  
<!--login-->
	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="<?=base_url('user/register_user');?>" method="post">
						<div class="input-group">
						  <span class="input-group-addon"><i class="fa fa-user"></i></span>
						  <input class="form-control" placeholder="First Name" name="fname" type="text">
						</div>
						<div class="input-group">
						  <span class="input-group-addon"><i class="fa fa-user"></i></span>
						  <input class="form-control" placeholder="Last Name" name="lname" type="text">
						</div>
						<div class="input-group">
						  <span class="input-group-addon">@</span>
						  <input class="form-control" placeholder="Enter Email" name="email" type="text">
						</div>
						<div class="input-group">
						  <span class="input-group-addon"><i class="fa fa-lock"> </i></span>
						  <input class="form-control" placeholder="Enter contact No." type="text" name="contact">
						</div>
						<div class="input-group">
						  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
						  <input class="form-control" placeholder="Password" type="password" name="password">
						</div>
						<div class="input-group">
						  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
						  <input class="form-control" placeholder="Confirm Password" type="password" name="cpassword">
						</div>
						<input type="submit" value="Submit">	
					</form>
				</div>
				
			</div>
		</div>
<!--footer-->
<div class="footer">
	<?php $this->load->view('site/site_footer');  ?>
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
<!-- cart function -->
<?php $this->load->view('cart/cart'); ?>

</body>
</html>