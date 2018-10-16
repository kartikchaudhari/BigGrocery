<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['PaymentModel','OrderModel']);
        $this->load->helper(['order','mail']);
	}

	public function addOrder(){
		//echo "Hey";
		//print_r($this->input->post());
		$this->OrderModel->createOrder($this->input->post());
	}

	public function order_success() {
    	
        //if the success page is refreshed again, prevent the system for re-payment
        //redirect user to home page 
        if($this->input->post()==null){
            return redirect('home');
        }
        
        $status = $this->input->post("status");
    	$firstname = $this->input->post("firstname");
    	$amount = $this->input->post("amount");
    	$txnid = $this->input->post("txnid");
    	$posted_hash = $this->input->post("hash");
    	$key = $this->input->post("key");
    	$productinfo = $this->input->post("productinfo");
    	$email = $this->input->post("email");
    	$salt = SALT;
        $udf1=$this->input->post("udf1");
        $udf2=$this->input->post("udf2");
        $payurefid=$this->input->post("payuMoneyId");
        $payment_date=$this->input->post('addedon');

    	$data=array();

    	

        if ($this->input->post("additionalCharges")) {
            $additionalCharges = $this->input->post("additionalCharges");
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||||||'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {

            $retHashSeq = $salt . '|' . $status . '||||||||||'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
            $data['msg'] = "Invalid Transaction. Please try again";
        } else {
            $data['msg1'] = "<h3>Thank You. Your order status is " . $status . ".</h3>";
            $data['msg2'] = "<h4>Your Reference ID for this transaction is " . $txnid . ".</h4>";
            $data['msg3'] = "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";

            //create a payment info array
    		$PaymentInfo=array('order_id'=>$udf1,'reference_id'=>$txnid,'payumoney_txn_id'=>$payurefid,'status'=>$status,'amount'=>$amount,'payment_date_time'=>$payment_date);

    		//insert the payment information to the dataase
    		$this->InsertPaymentInfo($PaymentInfo);

    		//update the order payment status
    		//if success == 1
    		$this->updatePaymentStatus($udf1,1);

            //send the mail to client
            Send_Mail($this->get_ordered_products($udf1));
        }
        $this->load->view('payment/success',['data'=>$data,'post_data'=>$this->input->post()]);
	}	

	public function order_fail(){
        
        if (!$this->input->post()) {
           return redirect('home');
        }

        $status = $this->input->post("status");
    	$firstname = $this->input->post("firstname");
    	$amount = $this->input->post("amount");
    	$txnid = $this->input->post("txnid");
    	$posted_hash = $this->input->post("hash");
    	$key = $this->input->post("key");
    	$productinfo = $this->input->post("productinfo");
    	$email = $this->input->post("email");
    	$salt = SALT;
        $udf1=$this->input->post("udf1");
        $payurefid=$this->input->post("payuMoneyId");
        $payment_date=$this->input->post("addedon");

        $unmappedstatus=$this->input->post("unmappedstatus");

    	$data=array();

    	        if ($this->input->post("additionalCharges")) {
            $additionalCharges = $this->input->post("additionalCharges");
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||||||'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {

            $retHashSeq = $salt . '|' . $status . '||||||||||'.$udf1.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
            $data['msg'] = "Invalid Transaction. Please try again";
        } else {
        	if($unmappedstatus=="userCancelled"){
            	$data['msg1'] = "<h3>Sorry !! Your order status is " . $status . ", becuase user cancelled the current transaction.</h3>";
            	$data['msg2'] = "<h4>Your Reference ID for this transaction is " . $txnid . ".</h4>";
        	}
            //create a payment info array
    		$PaymentInfo=array('order_id'=>$udf1,'reference_id'=>$txnid,'payumoney_txn_id'=>$payurefid,'status'=>$status,'amount'=>$amount,'payment_date_time'=>$payment_date);

    		//insert the payment information to the dataase
    		$this->InsertPaymentInfo($PaymentInfo,0);

    		//update the order payment status
    		//if failure == 0
    		$this->updatePaymentStatus($udf1,0);
        }
        $this->load->view('payment/failure',['data'=>$data]);

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