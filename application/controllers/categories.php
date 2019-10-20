<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->helper('admin');
	}

	public function index()
	{
	   if (is_logged_in()) {
            $page_data=array('title' => 'Add Product');
            $id=$this->session->userdata('bg_sys_ss_admin_id');
            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/categories/list');
            $this->load->view('admin/common/footer');
        }		
	}

	public function add(){
		if (is_logged_in()) {
            $page_data=array('title' => 'Add Product');
            $id=$this->session->userdata('bg_sys_ss_admin_id');

            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/categories/add');
            $this->load->view('admin/common/footer');
        }
	}


	public function FethCategories(){
		
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */