<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Service extends CI_Controller {
	
		public function index()
		{
			
		}

		public function faq(){
			$this->load->view('faq');
		}
		
		public function shipping(){
			$this->load->view('shipping');
		}

		public function terms(){
			$this->load->view('terms');
		}
	
	}
	
	/* End of file service.php */
	/* Location: ./application/controllers/service.php */
?>