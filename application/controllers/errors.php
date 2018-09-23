<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends My_Controller {

	public function error_404()
	{
		$this->load->view('errors/html/error_404');
	}

}

/* End of file errors.php */
/* Location: ./application/controllers/errors.php */