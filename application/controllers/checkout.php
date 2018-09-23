<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends My_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->library('payumoney');
		$this->payment=new payumoney();
	}

	public function index(){
		if (!$this->session->userdata('bg_sys_ss_user_id')) {
			return redirect('user/login');
		}
	}
	public function order($cart_id)
	{
		if (!$this->session->userdata('bg_sys_ss_user_id')) {
			return redirect('user/login');
		}else{
			$this->load->model('CartModel');
			$this->load->view('order',['OrderData'=>$this->CartModel->getCartData($cart_id),'PaymentInfo'=>$this->payment->getData(),'OrderId'=>$cart_id,'UserId'=>$this->CartModel->returnUserId($cart_id)]);
		}
	}
}

/* End of file checkout.php */
/* Location: ./application/controllers/checkout.php */