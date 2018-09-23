<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends My_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('AdminModel');
	}

	public function index()
	{
		$this->load->view('admin/login');

	}

	public function dashboard(){
		$this->load->view('admin/dashboard');
	}

	public function dashboard_content(){
		$this->load->view('admin/dashboard_content');
	}

	public function admin_profile(){
		$this->load->view('admin/profile');
	}

	public function do_login(){
		$userName=$this->input->post('uname');
		$passWord=md5($this->input->post('pass'));
		$AdminId=$this->AdminModel->getAdminLoginData($userName,$passWord);
		if($AdminId>0 AND $AdminId!=null){
			$array = array('bg_sys_ss_admin_id' => $AdminId);
			
			$this->session->set_userdata($array);
			return redirect('admin/dashboard');
		}

	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>