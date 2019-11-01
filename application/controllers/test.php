<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller {
	public function index(){
		 $this->load->model('ProductsModel');
		$AllProduct=$this->ProductsModel->getAllProducts();
		echo "<pre>";
		print_r($AllProduct);
	}
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */