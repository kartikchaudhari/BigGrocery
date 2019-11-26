<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$this->load->view('index');		
	}

	public function contact(){
		$data=array(
					'map'=>$this->config->item('contact_map_iframe'),
					'address'=>$this->config->item('contact_address'),
					'mail'=>$this->config->item('contact_email'),
					'phone'=>$this->config->item('contact_phone')
				);

		$this->load->view('contact',$data);
	}

	public function about(){
		$this->load->view('about');
	}

	public function privacy(){
		$this->load->view('privacy');
	}


}

/* End of file site.php */
/* Location: ./application/controllers/site.php */