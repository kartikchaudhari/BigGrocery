<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$this->load->view('index');		
	}

	public function contact(){
		$this->load->view('contact');
	}

	public function about(){

	}


}

/* End of file site.php */
/* Location: ./application/controllers/site.php */