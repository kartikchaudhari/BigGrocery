<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class My_Controller extends CI_Controller {
    	function __construct(){
    		parent::__construct();
			$this->load->helper(array('form','url','security','language','string'));
			$this->lang->load('en','english');
    	}

        protected function doLoadView($page,$common_data,$page_level_data=null){
            parent::__construct();
            $this->load->view('admin/common/head', ['data' => $common_data]);
            $this->load->view('admin/common/nav',['data' => $page_level_data]);
            $this->load->view($page, ['data' => $page_level_data]);
            $this->load->view('admin/common/footer');
        }

        protected function hey(){
            echo "Hey";
        }

    }
        
?>