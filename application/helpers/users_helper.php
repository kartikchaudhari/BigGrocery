<?php 
	function getUserInfo($UserId){
		$ci=&get_instance();
        $ci->load->model('UsersModel');
        
        $data=$ci->UsersModel->FethcUserInfo($UserId);
        if($data){
            return $data;
        }
        else{
            return null;
        }
	}

?>