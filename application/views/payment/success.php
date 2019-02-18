<!DOCTYPE html>
<html>
<head>
<title>Payment Successful</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- site css and js header -->
	<?php $this->load->view('customer/head'); ?>
<!--//site css and js header -->
</head>
<body>
<!-- offer -->
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
<!-- content -->
<div class="check-out">	 
	<div class="container" style="margin-top: -3%;">	 
		<div class="spec">
			<h3>Payment Successful !</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading" style="padding: 10px;">
						<h4 align="center">Payment Successful</h4>
					</div>
					<div class="panel-body" style="padding: 20px;">
						<?php echo $data['msg1']."<br>".$data['msg2']."<br>".$data['msg3']; ?>
					</div>
					<div class="panel-footer">
						<a href="<?=base_url('home');?>"><button type="button" class="btn btn-warning">Back to Home</button></a>
						&nbsp;<strong>&middot;</strong>&nbsp;
						<button type="button" class="btn btn-success">Shop more</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- for bootstrap working -->
		<script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
<!-- //for bootstrap working -->
<?php $this->load->view('cart/cart');?>
</body>
</html>
