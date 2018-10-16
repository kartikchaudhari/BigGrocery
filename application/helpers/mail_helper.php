 <?php
	
	// Send Gmail to another user
	function Send_Mail($data) {
		$ci=&get_instance();
		$ci->load->helper('order');
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
		//ridz791997@gmail.com
		//kokaniashishkumar@gmail.com
		$receiver_email = "kartikchaudhari456@gmail.com";
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
				<h3 style="margin-top: 2px;margin-bottom: 2px;">BigGrocery Order: 1319817322</h3><br>
				<span>Ahemdabad-Gujarat</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="border-bottom:1px solid grey;">
				<span> 2018-09-14 at 20:37:28 </span>
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
				<strong>Name:&nbsp;&nbsp;</strong><span>Ashish Kokani</span><br>
				<strong>Address:&nbsp;&nbsp;</strong><span>Room No.-1105, VGEC Boys Hostel - 1, Chandkheda</span><br>
				<strong>Phone:&nbsp;&nbsp;</strong><span>8153976277</span>
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
			<td align="right" style="border-top:1px solid grey;">520</td>
		</tr>
		<tr>
			<td style="font-size: 20px;"><strong>Grand total :</strong></td>
			<td style="font-size: 20px;" align="right"><strong>520</strong></td>
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
		   //Success email Sent
		   //echo $ci->email->print_debugger();
		}else{
		   //Email Failed To Send
		   echo $ci->email->print_debugger();
		}
		
	}

?>