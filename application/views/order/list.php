<?php $this->load->helper(array('order','date')); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Order History</title>
</head>
<body>
	<h1 align="center">Order History</h1>
	<hr width="90%" align="center"><br>
	<table border="1" align="center" width="80%">
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
</body>
</html>