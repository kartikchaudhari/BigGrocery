<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller {
	public function index(){
		$this->load->helper('utility');
        echo alert_style('warning','');
	}
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */