<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('AdminModel');
	}

	public function index()
	{
	   $this->load->view('admin/common/head',['data'=>array('title'=>'Categories')]);
	   $this->load->view('admin/cat/list');
	   $this->load->view('admin/common/footer');		
	}

	public function FethCategories(){
		
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */