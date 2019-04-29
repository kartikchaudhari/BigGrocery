<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//required for paytm Gateway
require_once(APPPATH."third_party/PaytmKit/lib/config_paytm.php");
require_once(APPPATH."third_party/PaytmKit/lib/encdec_paytm.php");

class Order extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['UsersModel','PaymentModel','OrderModel']);
        $this->load->helper(['order','mail','date']);
	}

	public function addOrder(){
		$this->OrderModel->createOrder($this->input->post());
	}

    /*
    * Order Success handler
     */
	public function order_success() {
    	
        //if the success page is refreshed again, prevent the system for re-payment
        //redirect user to home page 
        if($this->input->post()==null){
            return redirect('home');
        }
        
        //store message data
        $message_data=array();

        //Success Function for different payment gateway
        if ($this->input->post("payuMoneyId")) {
            $message_data=$this->PayUOrderSuccess($this->input->post());    
        }else{
            $message_data=$this->PayTmOrderSuccess($this->input->post());
        }
        $this->load->view('payment/success',['data'=>$message_data]);
	}	


    /*
    *   Order Failure handler
     */
	public function order_fail(){
        if (!$this->input->post()) {
           return redirect('home');
        }

         //store message data
         $message_data=array();

        //Fail Function for different payment gateway
        if ($this->input->post("payuMoneyId")) {
            $message_data=$this->PayUOrderFail($this->input->post());    
        }
        
        $this->load->view('payment/failure',['data'=>$message_data]);
	}


    public function response(){
        $message_data=array();
       
        if ($this->input->post()) {
            if ($this->input->post("STATUS")=="TXN_SUCCESS") {
                //echo "<pre>";
                $message_data=$this->PayTmOrderSuccess($this->input->post());
                //print_r($this->input->post());
                $this->load->view('payment/success',['data'=>$message_data]);
            }
            else if($this->input->post("STATUS")=="TXN_FAILURE"){
                //echo "<pre>";
                //print_r($this->input->post());
                $message_data=$this->PaytmOrderFail($this->input->post());
                $this->load->view('payment/failure',['data'=>$message_data]);
            }
        }
    }

/************************************ PayUMoney Paymet Gateway ***********************************/
    /*
    * PayUMoney Order Success
     */
    public function PayUOrderSuccess($post){

        $status = $post["status"];
        $firstname = $post["firstname"];
        $amount = $post["amount"];
        $txnid = $post["txnid"];
        $payment_mode=$post["mode"];
        $pg_name=$post["PG_TYPE"];
        $posted_hash = $post["hash"];
        $key = $post["key"];
        $productinfo = $post["productinfo"];
        $email = $post["email"];
        $salt = SALT;
        $udf1=$post["udf1"];
        $udf2=$post["udf2"];
        $payurefid=$post["payuMoneyId"];
        $payment_date=$post['addedon'];

        $data=array();

        

        /*if ($post["additionalCharges"]) {
            $additionalCharges = $post("additionalCharges");
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||||'.$udf2.'|'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {
            $retHashSeq = $salt . '|' . $status . '|||||||||'.$udf2.'|'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }*/


        $retHashSeq = $salt . '|' . $status . '|||||||||'.$udf2.'|'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;


        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
            $data['msg'] = "Invalid Transaction. Please try again";
        } else {
            $data['msg1'] = "<h3>Thank You. Your order status is " . $status . ".</h3>";
            $data['msg2'] = "<h4>Your Reference ID for this transaction is " . $txnid . ".</h4>";
            $data['msg3'] = "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";

            //create a payment info array
            $PaymentInfo=array(
                                'order_id'=>$udf1,
                                'reference_id'=>$txnid,
                                'payment_mode'=>$payment_mode,
                                'gateway'=>$pg_name,
                                'txn_id'=>$payurefid,
                                'status'=>$status,
                                'amount'=>$amount,
                                'payment_date_time'=>$payment_date
                            );

              //insert the payment information to the dataase
               $this->InsertPaymentInfo($PaymentInfo);

              //update the order payment status
              //if success == 1
               $this->updatePaymentStatus($udf1,1);

                //get UserInfo
                $UserInfo=$this->CustomerDetailById($udf2);
                $OrderInfo=$this->OrderModel->getOrderInfo($udf1);
                $UserAndOrderInfo=array(
                    'name'=>$UserInfo['fname']." ".$UserInfo['lname'],
                    'address'=>$UserInfo['delivery_address'],
                    'phone'=>$UserInfo['contact'],
                    'email'=>$UserInfo['email'],
                    'order_id'=>$udf1,
                    'total_amount'=>$OrderInfo['total_amount'],
                    'order_date'=>$OrderInfo['order_date']
                );
            
            //send the mail to client
            Send_Mail($this->get_ordered_products($udf1),$UserAndOrderInfo);
        }
        return $data;
    }

    /*
    * PayUMoney Order Faile
    */
    public function PayUOrderFail($post){
     
        $status = $post["status"];
        $firstname = $post["firstname"];
        $amount = $post["amount"];
        $txnid = $post["txnid"];
        $posted_hash = $post["hash"];
        $key = $post["key"];
        $productinfo = $post["productinfo"];
        $email = $post["email"];
        $salt = SALT;
        $udf1=$post["udf1"];
        $payurefid=$post["payuMoneyId"];
        $payment_date=$post["addedon"];
        $status=$post["status"];
        $field9=$post["field9"];
        $unmappedstatus=$post["unmappedstatus"];

        $data=array();

        // if ($this->input->post("additionalCharges")) {
        //     $additionalCharges = $this->input->post("additionalCharges");
        //     $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;

        // } else {

        //     $retHashSeq = $salt .'|' . $status . '|||||||||'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        // }

        $retHashSeq = $salt .'|' . $status . '|||||||||'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;

        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
            $data['msg'] = "Invalid Transaction. Please try again";
            $data['msg1'] = "<h3>Sorry !! Your order status is " . $status . ", becuase user cancelled the current transaction.</h3>";
            $data['msg2'] = "<h4>Your Reference ID for this transaction is " . $txnid . ".</h4>";
        } 
        else {
            if($unmappedstatus=="userCancelled"){
                $data['msg1'] = "<h3>Sorry !! Your order status is " . $status . ", becuase user cancelled the current transaction.</h3>";
                $data['msg2'] = "<h4>Your Reference ID for this transaction is " . $txnid . ".</h4>";
            }


            //create a payment info array
            $PaymentInfo=array('order_id'=>$udf1,'reference_id'=>$txnid,'payumoney_txn_id'=>$payurefid,'status'=>$status,'amount'=>$amount,'payment_date_time'=>$payment_date);

            //insert the payment information to the dataase
            $this->InsertPaymentInfo($PaymentInfo);

            //update the order payment status
            //if failure == 0
            $this->updatePaymentStatus($udf1,0);
        }

        return $data;
    }
/************************************ PayUMoney Paymet Gateway **************************************/


/************************************* PayTm Paymet Gateway *****************************************/
    /*
    * PayUMoney Order Success
     */
    public function PayTmOrderSuccess($post){
        
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";

        $data=array();
        if (isset($post)) {
            $paramList = $post;
            $paytmChecksum = isset($post["CHECKSUMHASH"]) ? $post["CHECKSUMHASH"] : "";//Sent by Paytm pg
            
            //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
            $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


            if($isValidChecksum == "TRUE") 
            {
                if ($post["STATUS"] == "TXN_SUCCESS") 
                {
                    $data['msg1']="<h3>Thank You. Your order status is success.</h3>";
                    //Process your transaction here as success transaction.
                    //Verify amount & order id received from Payment gateway with your application's order id and amount.
                }

                if (isset($post) && count($post)>0)
                { 
                    
                    $data['msg2'] = "<h4>Your Reference ID for this transaction is " . $post["TXNID"]. ".</h4>";
                    $data['msg3'] = "<h4>We have received a payment of Rs. " . $post["TXNAMOUNT"] . ". Your order will soon be shipped.</h4>";
                }
            }

            $PaymentInfo=array(
                                'order_id'=>$post["ORDERID"],
                                'reference_id'=>$post["BANKTXNID"],
                                'payment_mode'=>$post["PAYMENTMODE"],
                                'gateway'=>$post["GATEWAYNAME"],
                                'txn_id'=>$post["TXNID"],
                                'status'=>$post["STATUS"],
                                'amount'=>$post["TXNAMOUNT"],
                                'payment_date_time'=>$post["TXNDATE"]
                            );

              //insert the payment information to the dataase
               $this->InsertPaymentInfo($PaymentInfo);

              //update the order payment status
              //if success == 1
               $this->updatePaymentStatus($post["ORDERID"],1);

                //get UserInfo
                $UserInfo=$this->CustomerDetailById($this->session->userdata('bg_sys_ss_user_id'));
                $OrderInfo=$this->OrderModel->getOrderInfo($post["ORDERID"]);
                $UserAndOrderInfo=array(
                    'name'=>$UserInfo['fname']." ".$UserInfo['lname'],
                    'address'=>$UserInfo['delivery_address'],
                    'phone'=>$UserInfo['contact'],
                    'email'=>$UserInfo['email'],
                    'order_id'=>$post["ORDERID"],
                    'total_amount'=>$OrderInfo['total_amount'],
                    'order_date'=>$OrderInfo['order_date']
                );
            
            //send the mail to client
            Send_Mail($this->get_ordered_products($post["ORDERID"]),$UserAndOrderInfo);
        }
        else{
            return redirect('home');
        }

        return $data;
    }



    /*
    * PayUMoney Order Faile
    */
    public function PaytmOrderFail($post){
     header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";

        $data=array();
        if (isset($post)) {
            $paramList = $post;
            $paytmChecksum = isset($post["CHECKSUMHASH"]) ? $post["CHECKSUMHASH"] : "";//Sent by Paytm pg
            
            //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
            $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


            if($isValidChecksum == "TRUE") 
            {
                if ($post["STATUS"] == "TXN_FAILURE") 
                {
                    $data['msg1']="<h3>Sorry ! Your order status is failure.</h3>";
                    //Process your transaction here as success transaction.
                    //Verify amount & order id received from Payment gateway with your application's order id and amount.
                }

                if (isset($post) && count($post)>0)
                { 
                    $data['msg2'] = "<h4>Your Reference ID for this transaction is " . $post["TXNID"]. ".</h4>";
                    $data['msg3'] = "<h4><strong>Detailed Error Message:</storng> ".$post["RESPMSG"]."</h4>";
                }
            }
            
            //required for payment_date_time
            //to determine the exact date and time of payment failure
            date_default_timezone_set('Asia/Kolkata');


            //create a payment info array
            $PaymentInfo=array(
                                'order_id'=>$post["ORDERID"],
                                'reference_id'=>00000,
                                'payment_mode'=>'NN',
                                'gateway'=>'XXXX',
                                'txn_id'=>$post["TXNID"],
                                'status'=>$post["STATUS"],
                                'amount'=>$post["TXNAMOUNT"],
                                'payment_date_time'=>date('Y-m-d G:i:s')
                            );

            //insert the payment information to the dataase
            $this->InsertPaymentInfo($PaymentInfo);

            //update the order payment status
            //if failure == 0
            $this->updatePaymentStatus($post["ORDERID"],0);    
        }else{
            return redirect('home');
        }

        return $data;  
    }
/************************************* PayTm Paymet Gateway *****************************************/


    public function CustomerDetailById($UserId){
        return $this->UsersModel->FethcUserInfoForOrder($UserId);
    }
	public function InsertPaymentInfo($PaymentInfo){
		$this->PaymentModel->insertPaymentInfo($PaymentInfo);
	}

	public function updatePaymentStatus($CartId,$Status){
		$this->OrderModel->updateOrderPaymentStatus($CartId,$Status);
	}

    public function get_ordered_products($order_id){
       return $this->OrderModel->getOrderConents($order_id)[0]['cart_conetents'];
    }

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */