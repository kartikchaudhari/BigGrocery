<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends My_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->helper(array('admin','utility'));
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        if (is_logged_in()) {
            $page_data=array('title' => 'Dashboard');
            $id=$this->session->userdata('bg_sys_ss_admin_id');

            $admin_info=$this->AdminModel->getAdminInfo($id);

            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/dashboard');
            $this->load->view('admin/common/footer');
        }
    }

    public function login() {
        $page_data=array('title' => 'Login :: Administrator Login');
        $this->load->view('admin/common/head', ['data' => $page_data]);
        $this->load->view('admin/login');
        $this->load->view('admin/common/footer');
    }
    

    public function dashboard_content() {
        $this->load->view('admin/dashboard_content');
    }

    public function admin_profile() {
        $this->load->view('admin/profile');
    }

    public function do_login() {

        if(isset($_POST['uname'])){
            $userName = $this->input->post('uname');
            $passWord = md5($this->input->post('pass'));
            $AdminId = $this->AdminModel->getAdminLoginData($userName, $passWord);
            if ($AdminId > 0 AND $AdminId != null) {
                $array = array('bg_sys_ss_admin_id' => $AdminId);
                $this->session->set_userdata($array);
                return redirect('admin/dashboard', $data);
            } 
            else 
            {
                $this->session->set_flashdata('msg',alert_style('danger','Username and Password are wrong.'));
                return redirect('admin/login');
            }
        }
        else
        {
            $this->session->set_flashdata('msg',alert_style('warning','Plese login to Access System Dashboard.'));
                return redirect('admin/login');

        }
    }



    public function logout() {
        $this->session->sess_destroy();
        return redirect('home');
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>