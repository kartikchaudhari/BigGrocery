<?php $this->load->helper(array('order','date')); ?>
<!DOCTYPE html>
<html>
<head>
<title>Order History :: BirGrocery</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="" />

<!-- site css and js header -->
	<?php $this->load->view('customer/head'); ?>
<!--//site css and js header -->
<style type="text/css">
	.tbl_content th{
		padding: 5px;
	}

	.tbl_content td{
		padding: 2px;
	}
</style>
</head>
<body>
<body>
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
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info" style="margin-top: 10px;">
				<div class="panel-heading">
					<h3 style="padding:0px;margin-top: -15px;margin-bottom: -15px;" class="panel-title text-center">=: Your order History :=</h3>
				</div>
				<div class="panel-body" style="padding: 10px;">
					<div class="table-responsive">
						<table class="table" border="1" align="center" width="80%">
							<tr>
								<th>Sr. No</th>
								<th>Order Contents</th>
								<th>Total Quantity</th>
								<th>Total Price</th>
								<th>Date Ordered</th>
								<th>Payment Status</th>
							</tr>
							<?php 
								function checkPaymentStatus($status){
									if ($status=="pending") {
										return "<button>Make Payment</button>";
									}
									else{
										return $status;
									}
								}
								if(count($order_history_data)>0)
									for ($i=0,$j=1; $i <count($order_history_data); $i++,$j++) { 
										echo "<tr>
													<td align='center'>".$j."</td>
													<td align='center'  style='padding:20px;'>".json_to_table_render($order_history_data[$i]['cart_conetents'])."</td>
													<td align='center'>".$order_history_data[$i]['total_qty']."</td>
													<td align='center'>".$order_history_data[$i]['total_price']."</td>
													<td align='center'>".nice_date($order_history_data[$i]['order_date'],'d-m-Y')."</td>
													<td align='center'>".checkPaymentStatus($order_history_data[$i]['payment_status'])."</td>
											  </tr>";
									}
								else{
									echo "<tr><td style='padding:20px;' colspan='6' align='center'><strong>You have not ordered anything !!</strong></td></tr>";
								}
							?>
						</table>
					</div>
					<div class="row">
						<div class="col-md-12" style="padding-top: 0px;padding-bottom: 0px;">
							<center><?=$this->pagination->create_links();?></center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<hr width="90%" align="center"><br>
	<br>
	<hr width="90%" align="center">
	<br>
	<table width="80%" align="center">
		<tr>
			<td><a href="<?=base_url('home');?>"><button type="button">Home</button></a></td>
			<td><button type="button" onclick="window.print(this);">Print</button></td>
		</tr>
	</table>
	<br>
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
<?php $this->load->view('cart/cart');?>
</body>
</html>