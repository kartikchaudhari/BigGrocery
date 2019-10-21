<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller {
	public function index(){
		$this->load->model('CategoryModel');
		echo "<pre>";
		print_r($this->CategoryModel->getCategoriesArray());
	}
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */