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
		<div class="row">
			<div class="col-md-6">
				<address>
    				<strong>Shipping Address: <button title="Edit Shipping Address"><i class="fa fa-pencil"aria-hidden="true" ></i></button></strong><br>
                        <span><?=$UserInfo['fname']."&nbsp;&nbsp;".$UserInfo['lname'];?></span><br>
                        <span><?=$UserInfo['email'];?></span><br>
                        <span><?=$UserInfo['contact'];?></span><br>
    					<span><?=($UserInfo['address']==null)?"No address":$UserInfo['address'];?></span><br>
    			</address>
			</div>
			<div class="col-md-6"></div>
			<div class="clearfix"></div>
		</div> 
		<form action="<?=$PaymentInfo['action']?>" method="post" name="payuForm" id="payuForm">
			<table class="table table-bordered table-hover" style="font-size:17px;">
			 	<tr>
					<th class="t-head">No.</th>
					<th class="t-head">Product Name</th>
					<th class="t-head">Price</th>
					<th class="t-head">Quantity</th>
					<th class="t-head">Total</th>
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
			<div class="row">
				<div class="col-md-6 pull-right"><button type="submit" onclick="createOrder();" class="btn btn-success pull-right">Make Payment <i class="fa fa-arrow-circle-o-right"></i></button></div>
			</div>
		</form>
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
    function createOrder(){
    	 $.ajax({
    	 	url: '<?=base_url('order/addOrder')?>',
    	 	type: 'POST',
    	 	data: {cart_id: <?=$OrderId?>,total_amount:<?=$OrderData[0]['total_price'];?>,delivery_address:'<?=$UserInfo['address'];?>',payment_status:'pending'},
    	 })
    	 .done(function() {
    	 	console.log("success");
    	 	payuForm.submit();
    	 })
    	 .fail(function(data) {
    	 	console.log(data);
    	 })
    	 .always(function() {
    	 	console.log("complete");
    	 });
    	 
    }
</script>

<?php $this->load->view('cart/cart');?>
</body>
</html>











	
	
