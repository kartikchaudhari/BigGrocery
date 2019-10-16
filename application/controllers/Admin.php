<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends My_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('AdminModel');
	}

	public function index()
	{
		if ($this->is_admin_logged_in()) {
			$this->dashboard();
		}
	}

	public function dashboard(){
		if ($this->session->userdata('bg_sys_ss_admin_id')) {
			$this->load->view('admin/common/head',['data'=>array('title'=>'Dashboard')]);
			$this->load->view('admin/dashboard',['data'=>$this->AdminModel->getAdminInfo($this->session->userdata('bg_sys_ss_admin_id'))]);
			$this->load->view('admin/common/footer');
		}
		else{
			return redirect('admin/login');
		}

	}

	public function login(){
		$this->load->view('admin/common/head',['data'=>array('title'=>'Login :: Administrator Login')]);
		$this->load->view('admin/login');
		$this->load->view('admin/common/footer');
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
			return redirect('admin/dashboard',$data);
		}
		else{
			return redirect('admin');
		}

	}

	public function is_admin_logged_in(){
		if ($this->session->userdata('bg_sys_ss_admin_id')) {
			return true;
		}
		else{
			return redirect('admin/login');
		}
	}

	/*
		User logout
	 */
	public function logout(){
		$this->session->sess_destroy();
		return redirect('home');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>