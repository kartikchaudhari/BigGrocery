 <?php
	
	// Send Gmail to another user
	function Send_Mail($data,$UserAndOrderInfo) {
		$ci=&get_instance();
		$ci->load->helper('order');
		//$ci->load->library('Dom_pdf');
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_timeout'=>20,
		    'smtp_user' => 'myciapps2018@gmail.com',
		    'smtp_pass' => 'Codeigniter@2018',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$ci->load->library('email', $config);
		$ci->email->set_newline("\r\n");
		$receiver_email = $UserAndOrderInfo['email'];
		$username = "BigGrocery";
		$subject = "Receipt";
		$message = '<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
</head>
<body>
	<table border="0" width="26%" align="center" cellspacing="0" cellpadding="10">
		<tr>
			<td colspan="2" align="center" style="border-bottom: 1px solid black;">
				<img src="https://image.ibb.co/n2i6HK/big_Brocery_resized.jpg">
			</td>
		</tr>
		<tr >
			<td colspan="2" align="center" style="padding: 10px;border-bottom:1px solid grey;">
				<h3 style="margin-top: 2px;margin-bottom: 2px;">BigGrocery Order: '.$UserAndOrderInfo['order_id'].'</h3><br>
				<span>Ahemdabad-Gujarat</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="border-bottom:1px solid grey;">
				<span> '.$UserAndOrderInfo['order_date'].' </span>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="border-bottom:1px solid grey;">
				<h3 style="margin-top: 2px;margin-bottom: 2px;color:darkgreen;">PAID</h3><br>
				<span>Delivered By BigGrocery</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom:1px solid grey;padding: 4px;">
				<strong>Name:&nbsp;&nbsp;</strong><span>'.$UserAndOrderInfo['name'].'</span><br>
				<strong>Address:&nbsp;&nbsp;</strong><span>'.$UserAndOrderInfo['address'].'</span><br>
				<strong>Phone:&nbsp;&nbsp;</strong><span>'.$UserAndOrderInfo['phone'].'</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" >
				<h3 align="center" style="margin-top: 2px;margin-bottom: 0px;"><u>-:: ORDER ::-</u></h3>
			</td>
		</tr>';
		
		$message.='<tr><td colspan="2">'.json_to_table_render($data).'</td></tr>';
		$message.=
		'<tr>
			<td style="border-top:1px solid grey;"><strong>Sub total :</strong></td>
			<td align="right" style="border-top:1px solid grey;">'.$UserAndOrderInfo['total_amount'].'</td>
		</tr>
		<tr>
			<td style="font-size: 20px;"><strong>Grand total :</strong></td>
			<td style="font-size: 20px;" align="right"><strong>'.$UserAndOrderInfo['total_amount'].'</strong></td>
		</tr>
		<tr><td colspan="2" style="border-top:1px solid black"><h4 align="center">Thank You</h4></td></tr>
	</table>
</body>
</html>
';
		// Sender email address
		$ci->email->from($config['smtp_user'], $username);

		// Receiver email address
		$ci->email->to($receiver_email);

		// Subject of email
		$ci->email->subject($subject);

		// Message in email
		$ci->email->message($message);


		if($ci->email->send()){
			//genrate pdf
			//$ci->Dom_pdf->load_view($message);
		   
		   //echo $ci->email->print_debugger();
		}else{
		   //Email Failed To Send
		   echo $ci->email->print_debugger();
		}
		
	}

	// Send Gmail to another user
	function send_forgot_password($data,$UserAndOrderInfo) {
		$ci=&get_instance();
		$ci->load->helper('order');
		//$ci->load->library('Dom_pdf');
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_timeout'=>20,
		    'smtp_user' => 'myciapps2018@gmail.com',
		    'smtp_pass' => 'Codeigniter@2018',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$ci->load->library('email', $config);
		$ci->email->set_newline("\r\n");
		$receiver_email = $UserAndOrderInfo['email'];
		$username = "BigGrocery";
		$subject = "Reset Password";
		$message = '<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
</head>
<body>
	<table border="0" width="70%" align="center" cellspacing="0" cellpadding="10">
		<tr>
			<td colspan="2" align="center" style="border-bottom: 1px solid black;">
				<img src="https://image.ibb.co/n2i6HK/big_Brocery_resized.jpg">
			</td>
		</tr>
		<tr >
			<td colspan="2" align="center" style="padding: 10px;border-bottom:1px solid grey;">
				<h3 style="margin-top: 2px;margin-bottom: 2px;">BigGrocery Order: '.$UserAndOrderInfo['order_id'].'</h3><br>
				<span>Ahemdabad-Gujarat</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="border-bottom:1px solid grey;">
				<span> '.$UserAndOrderInfo['order_date'].' </span>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="border-bottom:1px solid grey;">
				<h3 style="margin-top: 2px;margin-bottom: 2px;color:darkgreen;">PAID</h3><br>
				<span>Delivered By BigGrocery</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom:1px solid grey;padding: 4px;">
				<strong>Name:&nbsp;&nbsp;</strong><span>'.$UserAndOrderInfo['name'].'</span><br>
				<strong>Address:&nbsp;&nbsp;</strong><span>'.$UserAndOrderInfo['address'].'</span><br>
				<strong>Phone:&nbsp;&nbsp;</strong><span>'.$UserAndOrderInfo['phone'].'</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" >
				<h3 align="center" style="margin-top: 2px;margin-bottom: 0px;"><u>-:: ORDER ::-</u></h3>
			</td>
		</tr>';
		
		$message.='<tr><td colspan="2">'.json_to_table_render($data).'</td></tr>';
		$message.=
		'<tr>
			<td style="border-top:1px solid grey;"><strong>Sub total :</strong></td>
			<td align="right" style="border-top:1px solid grey;">'.$UserAndOrderInfo['total_amount'].'</td>
		</tr>
		<tr>
			<td style="font-size: 20px;"><strong>Grand total :</strong></td>
			<td style="font-size: 20px;" align="right"><strong>'.$UserAndOrderInfo['total_amount'].'</strong></td>
		</tr>
		<tr><td colspan="2" style="border-top:1px solid black"><h4 align="center">Thank You</h4></td></tr>
	</table>
</body>
</html>
';
		// Sender email address
		$ci->email->from($config['smtp_user'], $username);

		// Receiver email address
		$ci->email->to($receiver_email);

		// Subject of email
		$ci->email->subject($subject);

		// Message in email
		$ci->email->message($message);


		if($ci->email->send()){
			//genrate pdf
			//$ci->Dom_pdf->load_view($message);
		   
		   //echo $ci->email->print_debugger();
		}else{
		   //Email Failed To Send
		   echo $ci->email->print_debugger();
		}
		
	}

?>