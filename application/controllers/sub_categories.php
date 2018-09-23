<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_categories extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('SubCatModel');
	}

	public function index()
	{	
		$this->load->view('admin/subcat/view',['data'=>$this->getAllSubCat()]);		
	}

	public function add()
	{
		$data=array();
		$data['cat']=$this->getCategoriesList();
		$this->load->view('admin/subcat/add',['data'=>$data]);		
	}

	public function remove()
	{
		$this->load->view('admin/subcat/remove',['data'=>$this->getAllSubCat()]);		
	}

	public function add_action(){
		
		if($this->SubCatModel->AddSubCat($this->input->post())){
			$this->session->set_flashdata('bg_sys_msg', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Success!</strong> The Sub category <strong>'.$this->input->post("sub_cat_name").'</strong> is added successfully.</div>');

			return redirect('sub_categories/add','refresh');
		}else{
			return redirect('sub_categories/add','refresh');
		}
	}

	public function delete_action($SubCatId){
		if($this->SubCatModel->DeleteSubCat($SubCatId)){
			$this->session->set_flashdata('bg_sys_msg', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Success!</strong> The Sub category <strong>'.$this->input->post("sub_cat_name").'</strong> and it&quot;s associated products are removed successfully.</div>');

			return redirect('sub_categories/remove','refresh');
		}else{
			return redirect('sub_categories/remove','refresh');
		}
	}

	public function getCategoriesList(){
		return $this->SubCatModel->FetchCatToList();
	}

	public function getAllSubCat(){
		return $this->SubCatModel->FetchAllSubCat();
	}


}

/* End of file sub_categories.php */
/* Location: ./application/controllers/sub_categories.php */