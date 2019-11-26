<?php 
	function get_footer_data(){
		$ci=&get_instance();
        $ci->load->model('SettingsModel');
        
        $data=$ci->SettingsModel->pull_footer_settings();
        if($data){
            return $data;
        }
        else{
            return null;
        }
	}

?>