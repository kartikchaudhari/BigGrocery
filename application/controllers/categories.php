<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('AdminModel','CategoryModel'));
		$this->load->helper(array('product','utility','admin'));
	}

	public function index()
	{
	   
	}

	public function add(){
		if (is_logged_in()) {
            $page_data=array('title' => 'Add Product');
            $id=$this->session->userdata('bg_sys_ss_admin_id');

            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/categories/add');
            $this->load->view('admin/common/footer');
        }
	}
    public function view($cat_id){
        if (is_logged_in()) {
            $page_data=array('title' => 'View Category');
            $id=$this->session->userdata('bg_sys_ss_admin_id');

            $this->load->model(array('SubCatModel','ProductsModel'));
            $cat_info_data=array();
            $cat_info_data['cat_name']=$this->CategoryModel->getCategoryInfoByCatId($cat_id)['cat_name'];
            $cat_info_data['count_sub_cat']=$this->SubCatModel->fetchSubCatCountByCatId($cat_id)['sub_cat_count'];
            $cat_info_data['count_product']=$this->ProductsModel->getProductCountByCategory($cat_id)['product_count'];

            $products_of_category=$this->ProductsModel->getAllProductsByCategory($cat_id);

            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/categories/view',['cat_info_data'=>$cat_info_data,'products'=>$products_of_category]);
            $this->load->view('admin/common/footer');
        }
    }
	public function manage(){
		if (is_logged_in()) {
            $page_data=array('title' => 'Manage Categories');
            $id=$this->session->userdata('bg_sys_ss_admin_id');

            $data=$this->CategoryModel->getCategoriesArray();

            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/categories/list',['data'=>$data]);
            $this->load->view('admin/common/footer');
        }		
	}
	public function  update($cat_id){
        if (is_logged_in()) {
            $page_data=array('title' => 'View Category');
            $id=$this->session->userdata('bg_sys_ss_admin_id');


            $cat_info_data=array();
            $cat_info_data['cat_name']=$this->CategoryModel->getCategoryInfoByCatId($cat_id)['cat_name'];
            $cat_info_data['cat_id']=$cat_id;

            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/categories/update',['cat_info_data'=>$cat_info_data]);
            $this->load->view('admin/common/footer');
        }
    }





    //action methods
    public function  doUpdateCategory(){
        if (is_logged_in()) {
            if(isset($_POST['btnUpdate'])){
                $data=array();
                $data['cat_id']=$this->security->xss_clean($this->input->post('cat_id'));
                $data['cat_name']=$this->security->xss_clean($this->input->post('cat_name'));

                if($this->CategoryModel->updateCategory($data)){
                    $this->session->set_flashdata('bg_sys_msg',alert_style('success','Category Updated Successfully. !'));
                    return redirect('Categories/manage');
                }
                else{
                    $this->session->set_flashdata('bg_sys_msg',alert_style('danger','An Error  Occured while updating data. !'));
                    return redirect('Categories/manage');
                }
            }
            else{
                return redirect('Categories/manage');
            }
        }
    }

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */