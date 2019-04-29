<?php $this->load->helper('users');$UserInfo=getUserInfo($UserId);?>
<!DOCTYPE html>
<html>
<head>
<title>Your Order :: BirGrocery</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<style type="text/css">
	input[type='radio']{
		cursor: pointer;
	}
</style>

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
			<h3>Your Order</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		
		<!-- collapse -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel-group" id="accordion">
					
					<!--1. Shipping address -->
			  		<div class="panel panel-success">
			    		<div class="panel-heading">
			      			<h4 class="panel-title">
			        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
			        			1. Shipping Address: <i class="fa fa-pencil"aria-hidden="true" ></i></a>
			      			</h4>
			    		</div>
			    		<div id="collapse1" class="panel-collapse collapse in">
					    	<div class="panel-body">
					      		<div class="col-md-6" style="padding-top: 15px;">
									<address>
				                        <span><?=$UserInfo['fname']."&nbsp;&nbsp;".$UserInfo['lname'];?></span><br>
				                        <span><?=$UserInfo['email'];?></span><br>
				                        <span><?=$UserInfo['contact'];?></span><br>
				    					<span><?=($UserInfo['address']==null)?"No address":$UserInfo['address'];?></span><br>
					    			</address>
								</div>
					      </div>
			    		</div>
			  		</div>
			  		<!--/Shipping Address -->

			  		<!--2. Order Contents -->
			  		<div class="panel panel-info">
			   			<div class="panel-heading">
			      			<h4 class="panel-title">
			        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">2. Order Contents</a>
			      			</h4>
			    		</div>
					    <div id="collapse2" class="panel-collapse collapse">
					     	<div class="panel-body" style="padding-top: 15px;">
								<table class="table table-bordered table-hover" style="font-size:17px;">
								 	<tr class="active">
										<th>No.</th>
										<th>Product Name</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
									<?php 
										$order_data=json_decode($OrderData[0]['cart_conetents'],true);
								
										$productinfo='';
										for ($i=0,$j=1; $i<count($order_data); $i++,$j++) { 
											echo "<tr>
														<td>".$j."</td>
														<td>".$order_data[$i]['name']."</td>
														<td>".$order_data[$i]['price']."</td>
														<td>".$order_data[$i]['quantity']."</td>
														<td>".$order_data[$i]['quantity']*$order_data[$i]['price']."</td>
												</tr>";
											$productinfo.=$order_data[$i]['name'];
										}
										echo "<tr class='active'><td colspan='4' align='right'><strong>Grand Total: </strong></td><td>".$OrderData[0]['total_price']."</td></tr>";
									?>
								</table> 
					  		</div>
					    </div>
			  		</div>
			  		<!-- Order Contents -->
					
					<!-- 3. Payment options -->
			  		<div class="panel panel-warning">
			    		<div class="panel-heading">
			      			<h4 class="panel-title">
			      				<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">3. Payment Options</a>
			      			</h4>
			    		</div>
			    		<div id="collapse3" class="panel-collapse collapse">
			      			<div class="panel-body" style="padding:15px;">
			      				<div class="row">
			      					<div class="col-md-12">
			      						<div class="col-md-4">
			      							<div class="panel panel-success">
			      								<div class="panel-heading" style="padding: 0px;">
			      									<h3 class="panel-title" style="padding:10px;">Pay via payumoney &nbsp;&nbsp;<input name="paymentradio" type="radio" onclick="disablePaymentOptions('payumoneySubmit','paytmSubmit');" title="Check radio button to make payment via payUmoney payment gateway."></h3>
			      								</div>
			      								<div class="panel-body" style="padding: 15px;">
			      									<!-- payumoney payment -->
			  										<form  action="<?=$PaymentInfo['action']?>" method="post" name="payuForm" id="payuForm">
													<?php
														//$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
														$hash_string = MERCHANT_KEY."|".$PaymentInfo['txnid']."|".$OrderData[0]['total_price']."|".$productinfo."|".$UserInfo['fname']."|".$UserInfo['email']."|".$OrderId."|".$UserId."|||||||||".SALT;
														$hash= strtolower(hash('sha512', $hash_string));
											 		?>
				
													<input type="hidden" name="key" value="<?php echo MERCHANT_KEY ?>" />
												    <input type="hidden" name="txnid" value="<?=$PaymentInfo['txnid']; ?>" />
												    <input type="hidden" name="amount" value="<?=$OrderData[0]['total_price'];?>" />
												    <input type="hidden" name="firstname" id="firstname" value="<?=$UserInfo['fname']?>">
												    <input type="hidden" name="email" id="email" value="<?=$UserInfo['email']?>" />
												    <input type="hidden" name="udf1" value="<?=$OrderId;?>">
												    <input type="hidden" name="udf2" value="<?=$UserId;?>">
												    <input type="hidden" name="phone" value="<?=$UserInfo['contact']?>" />
												    <input type="hidden" name="productinfo" value="<?=$productinfo;?>">
												    <input type="hidden" name="surl" value="<?php echo SUCCESS_URL; ?>" />
												    <input type="hidden" name="furl" value="<?php echo  FAIL_URL;?>"/>
												    <input type="hidden" name="service_provider" value="<?= SERVICE_PROVIDER;?>" >
												    <input type='hidden' name='hash' value='<?=$hash;?>'>
													
													<button name="payumoneySubmit" id="payumoneySubmit" type="submit" onclick="createOrder('payuForm');" class="btn btn-success col-md-offset-3"  disabled="disabled">Make Payment <i class="fa fa-arrow-circle-o-right"></i></button>
													</form>
						      						<!--/payumoney payment -->
			      								</div>
			      							</div>
			      						</div>

			      						<div class="col-md-4">
			      							<div class="panel panel-info">
			      								<div class="panel-heading" style="padding: 0px;">
			      									<h3 class="panel-title" style="padding:10px;">Pay via paytm&nbsp;&nbsp;<input name="paymentradio" type="radio" onclick="disablePaymentOptions('paytmSubmit','payumoneySubmit');" title="Check radio button to make payment via paytm payment gateway."></h3>
			      								</div>
			      								<div class="panel-body" style="padding: 15px;">
			      									<!-- paytm payment -->
			      									<form action="<?=site_url('paytmpay/pgRedirect');?>" method="post"  name="paytmForm" id="paytmForm">
														<input type="hidden"  id="ORDER_ID" tabindex="1" name="ORDER_ID"value="<?=$OrderId;?>">
														<input type="hidden" id="CUST_ID" tabindex="2" name="CUST_ID" value="<?=$UserId;?>">
													   	<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" name="INDUSTRY_TYPE_ID" value="Retail">

													   	<input type="hidden" id="CHANNEL_ID" tabindex="4" name="CHANNEL_ID" value="WEB">
													   	<input tabindex="10" type="hidden" name="TXN_AMOUNT" value="<?=$OrderData[0]['total_price'];?>">
													   	<input type="hidden" name="CUST_EMAIL" id="email" value="<?=$UserInfo['email']?>" />
														
														<input type="hidden" name="CUST_PHONE" value="<?=$UserInfo['contact']?>" />
								

														<button name="paytmSubmit" id="paytmSubmit" onclick="createOrder('paytmForm');" class="btn btn-info col-md-offset-3" disabled="disabled">Make Payment <i class="fa fa-arrow-circle-o-right"></i></button>
													</form>
						      						<!--/paytm payment -->
			      								</div>
			      							</div>
			      						
			      						</div>
			      					</div>
			      				</div>
			      			</div>
			    		</div>
  					</div>
  					<!-- Payment Options -->

		  		</div>
		  	</div>
		</div>
	</div>
</div>

<!--footer-->
<div class="footer">
	<?php $this->load->view('site/site_footer'); ?>
</div>


<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() { $().UItoTop({ easingType: 'easeOutQuart' });});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->



<!-- for bootstrap working -->
		<script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
<!-- //for bootstrap working -->



<script type="text/javascript">
    function createOrder(form){
    	 $.ajax({
    	 	url: '<?=base_url('order/addOrder')?>',
    	 	type: 'POST',
    	 	data: {cart_id: <?=$OrderId?>,total_amount:<?=$OrderData[0]['total_price'];?>,delivery_address:'<?=$UserInfo['address'];?>',payment_status:'pending'},
    	 })
    	 .done(function() {
    	 	console.log("success");
    	 	form.submit();
    	 })
    	 .fail(function(data) {
    	 	console.log(data);
    	 })
    	 .always(function() {
    	 	console.log("complete");
    	 });
    	 
    }

    function disablePaymentOptions(btnDestination,btnSource){
    	var btnDest='#'+btnDestination+'';
    	var btnSrc='#'+btnSource+'';
    	$(btnDest).removeAttr('disabled');
    	$(btnSrc).attr({
    		'disabled': 'disabled'
    	});
    }

</script>

<?php $this->load->view('cart/cart');?>
</body>
</html>











	
	
