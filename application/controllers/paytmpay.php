<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require_once(APPPATH."third_party/PaytmKit/lib/config_paytm.php");
	require_once(APPPATH."third_party/PaytmKit/lib/encdec_paytm.php");
	class Paytmpay extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
		}

		public function index()
		{
			$this->load->view('payment/paytm/txnTest');
		}

		public function pgRedirect(){
			header("Pragma: no-cache");
			header("Cache-Control: no-cache");
			header("Expires: 0");

			$checkSum = "";
			$paramList = array();

			if(isset($_POST)){
				// Create an array having all required parameters for creating checksum.
				$paramList["MID"] = PAYTM_MERCHANT_MID;
				$paramList["ORDER_ID"] = $this->input->post("ORDER_ID");
				$paramList["CUST_ID"] = $this->input->post("CUST_ID");
				$paramList["INDUSTRY_TYPE_ID"] = $this->input->post("INDUSTRY_TYPE_ID");
				$paramList["CHANNEL_ID"] = $this->input->post("CHANNEL_ID");
				$paramList["TXN_AMOUNT"] = $this->input->post("TXN_AMOUNT");
				$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;


				$paramList["CALLBACK_URL"] = site_url('paytmpay/pgResponse');
				$paramList["MSISDN"] = "7990608088"; //Mobile number of customer
				$paramList["EMAIL"] = "myciapps2018@gmail.com"; //Email ID of customer
				$paramList["VERIFIED_BY"] = "EMAIL"; //
				$paramList["IS_USER_VERIFIED"] = "YES"; //



				//Here checksum string will return by getChecksumFromArray() function.
				$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
				
				$paramList["checkSum"]=$checkSum;
				$this->load->view('payment/paytm/pgRedirect', ['data'=>$paramList]);	
			}
			else{
				show_404();
			}
		}

		public function pgResponse(){
			header("Pragma: no-cache");
			header("Cache-Control: no-cache");
			header("Expires: 0");

			$paytmChecksum = "";
			$paramList = array();
			$isValidChecksum = "FALSE";

			if (isset($_POST)) {
				$paramList = $_POST;
				$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";//Sent by Paytm pg
				
				//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
				$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


				if($isValidChecksum == "TRUE") {
					$msg="<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
					if ($_POST["STATUS"] == "TXN_SUCCESS") {
						$msg.="<b>Transaction status is success</b>" . "<br/>";
						//Process your transaction here as success transaction.
						//Verify amount & order id received from Payment gateway with your application's order id and amount.
					}
					else {
						$msg.="<b>Transaction status is failure</b>" . "<br/>";
					}

					if (isset($_POST) && count($_POST)>0){ 
						foreach($_POST as $paramName => $paramValue) {
								$msg.= "<br/>" . $paramName . " = " . $paramValue;
						}
					}

				}
				else {
					$msg= "<b>Checksum mismatched.</b>";
					//Process transaction as suspicious.
				}

				$this->load->view('payment/paytm/pgResponse',['data'=>$msg]);
			}else{
				show_404();
			}
		}
	
	}
	
	/* End of file paytm.php */
	/* Location: ./application/controllers/paytm.php */
?>