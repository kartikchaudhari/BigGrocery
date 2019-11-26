<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller {
	public function index(){
		$this->load->helper('mail');
		send_forgot_password('Kartik Chaudhari','kartikchaudhari456@gmail.com','http://localhost/phpmyadmin/sql.php?db=biggrocer&table=settings&pos=0');
	}
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */