<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends My_Controller {

	public function __construct(){
		parent::__construct();

		//load the model 
		$this->load->model('CartModel');
	}

	public function AddToCart(){
		$data=array(
					'user_id'=>$this->input->post('user_id'),
					'cart_conetents'=>$this->input->post('myData'),
					'total_qty'=>$this->input->post('tQuantity'),
					'total_price'=>$this->input->post('tPrice')
				);
		//print_r($data);
		echo $this->CartModel->addToCart($data);
	}

	
}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */