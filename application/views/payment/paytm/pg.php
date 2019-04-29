<!DOCTYPE html>
<html>
<head>
<title>Paytm Checkout Page</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- site css and js header -->
	<?php $this->load->view('customer/head'); ?>
<!--//site css and js header -->
</head>
<body>

<!-- content -->
<div class="check-out">	 
	<div class="container" style="margin-top: -3%;">	 
		<div class="spec">
			<h3 class="text-danger">Please do not refresh this page</h3>
			<hr style="border-top: 5px dashed black;">
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading" style="padding: 10px;">
						<h4 align="center"><strong>Proccessing Transaction</strong></h4>
					</div>
					<div class="panel-body" style="padding: 20px;">
						<div class="col-md-12" style="margin-top: 4%;">
							<center><span>We are processing your transaction...</span></center>
						</div>
						<div class="col-md-12" style="margin-top: 2%;margin-bottom: 2%;">
							<center><img src="<?=base_url('assets/images/ajax-loader-new.gif');?>"></center>
						</div>
						<div class="col-md-12" style="margin-top: 2%;">
							<center><span>This proccess might take some time. Please do not hit refresh or back button or close this window.</span></center>
						</div>
						<div class="col-md-12" style="margin-top: 2%;margin-bottom: 2%;">
							
						</div>
						<hr style="border:0.5px solid grey;">
						<div class="col-md-12" style="margin-top: 1%;">
							<center><span>If it is taking too long to load, you may cancel this transaction and retry.</span><br><span>Your account will not be charged.</span></center>
						</div>
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
