<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('DesignModel','AdminModel'));	
	}

	public function index()
	{
	}

	public function banner(){
	
	}

	public function add(){
		$bannerList=$this->listBanner();
		$this->load->view('admin/design/banner/add',['data'=>$bannerList]);
	}

	public function add_banner_info($b_id){
		echo $b_id;
	}




	/*
	* Designg action methods
	 */
	public function doAddBanner(){
		if ($this->input->post()) {
			$isBannerInserted=$this->DesignModel->insertBanner($this->input->post());
			if ($isBannerInserted==1) {
				$this->session->set_flashdata('msg', '<h2>Banner Inserted</h2>');
				return redirect('design/add');
			}
		}
	}

	public function listBanner(){
		return 	$this->DesignModel->getBanners();
	}

}

/* End of file design.php */
/* Location: ./application/controllers/design.php */
?>