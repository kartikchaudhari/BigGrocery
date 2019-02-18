<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller {

	public function a(){
		$this->load->model('UsersModel');
		echo "<pre>";
		print_r($this->UsersModel->FethcUserInfoForOrder(5));
	}

	public function b(){
		$this->load->model('OrderModel');
		echo "<pre>";
		print_r($this->OrderModel->getOrderInfo(55));
	}
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */