<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller {
	public function index(){
		$this->load->model('UsersModel');
		$userInfo = $this->UsersModel->getUserInfoByEmail("kartikchaudhari456@gmail.com");
        if(!$userInfo){
            echo 'We cant find your email address';
        }
        else{
        	echo "<pre>";
        	print_r($userInfo);
        	echo "<br><br>";
        	echo $this->UsersModel->insertToken($userInfo->user_id);
        }
	}
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */