<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

	public function index()
	{
	// 		$this->load->view('yourviewpage_name');
	// $html = $this->output->get_output();
	$this->load->library('Dom_pdf');
	$html='
		<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
</head>
<body>
	<table border="1" width="50%" align="center" cellspacing="0" cellpadding="10">
		<tr>
			<td colspan="2" align="center" style="border-bottom: 1px solid black;">
				<img src="'.APPPATH.'/third_party/dompdf/big_Brocery_resized.jpg">
			</td>
		</tr>
		<tr >
			<td colspan="2" align="center" style="padding: 10px;border-bottom:1px solid grey;">
				<h3 style="margin-top: 2px;margin-bottom: 2px;">BigGrocery Order: 1319817322</h3>
				<span>Ahemdabad-Gujarat</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="border-bottom:1px solid grey;">
				<span>
					2018-09-14 20:37:28
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="border-bottom:1px solid grey;">
				<h3 style="margin-top: 2px;margin-bottom: 2px;color:darkgreen;">PAID</h3>
				<span>Delivered By BigGrocery</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom:1px solid grey;padding: 4px;">
				<strong>Name:&nbsp;&nbsp;</strong><span>Kartik Chaudhari</span><br>
				<strong>Address:&nbsp;&nbsp;</strong><span>Room No.-1105, VGEC Boys Hostel-1, Chandkheda</span><br>
				<strong>Phone:&nbsp;&nbsp;</strong><span>8153976277</span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h3 align="center" style="margin-top: 2px;margin-bottom: 0px;"><u>-:: ORDER ::-</u></h3>
			</td>
		</tr>
		<tr>
			<td>
				<li style="list-style: none;">2 X Butter milk</li>
				<li style="list-style: none;">2 X milk</li>
			</td>
			<td align="right">
				<li style="list-style:none;">310</li>
				<li style="list-style:none;">210</li>
			</td>
		</tr>
		<tr>
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
</html>';
	// Convert to PDF
	$this->dompdf->load_html($html);
    $this->dompdf->render();
	$this->dompdf->stream("report_".date('d-m-y')."_".date("h:i:s"),array("Attachment"=>1));
	}


}

/* End of file pdf.php */
/* Location: ./application/controllers/pdf.php */