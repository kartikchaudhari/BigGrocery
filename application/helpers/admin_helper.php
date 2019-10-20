<?php 
	function getAdminInfo($admin_id){
		$ci=&get_instance();
        $ci->load->model('AdminModel');
        
        $data=$ci->AdminModel->getAdminInfo($admin_id);
        if($data){
            return $data[0];
        }
        else{
            return null;
        }
	}

    function is_logged_in(){
        $ci=&get_instance();
        if ($ci->session->userdata('bg_sys_ss_admin_id')) {
            return true;
        } else {
            return redirect('admin/login');
        }
    }



?>