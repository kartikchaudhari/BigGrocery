<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubCategories extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('SubCatModel','ProductsModel','CategoryModel'));
		$this->load->helper(array('admin','utility','product'));
	}

	public function index()
	{	
		if (is_logged_in()) {
            $page_data=array('title' => 'Sub Categories');
            $id=$this->session->userdata('bg_sys_ss_admin_id');
            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/subcat/list',['data'=>$this->getAllSubCat()]);
            $this->load->view('admin/common/footer');
        }		
	}

	public function add()
	{	
		if (is_logged_in()) {
            
            $page_data=array('title' => 'Add Sub Category');
            $id=$this->session->userdata('bg_sys_ss_admin_id');

            $data=array();
            $data['cat']=$this->getCategoriesList();

            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/subcat/add',['data'=>$data]);
            $this->load->view('admin/common/footer');
        }		
	}

	public function view($sub_cat_id){
		if (is_logged_in()) {
            $page_data=array('title' => 'View Sub Category Info');
            $id=$this->session->userdata('bg_sys_ss_admin_id');

            $subcat_info_data=array();
            $subcat_info_data['cat_name']=getCatNameByCatId($this->SubCatModel->fetchCatIdBySubCatId($sub_cat_id)['cat_id']);
            $subcat_info_data['sub_cat_name']=getSubCatNameBySubCatId($sub_cat_id);
            $subcat_info_data['count_product']=$this->ProductsModel->getProductCountBySubCategory($sub_cat_id)['product_count'];

            $products_of_subcategory=$this->ProductsModel->getAllProductsBySubCategory(1);

            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/subcat/view',['subcat_info_data'=>$subcat_info_data,'products'=>$products_of_subcategory]);
            $this->load->view('admin/common/footer');
        }
	}

	public function  update($sub_cat_id){
        if (is_logged_in()) {
            $page_data=array('title' => 'Update Sub Category');
            $id=$this->session->userdata('bg_sys_ss_admin_id');

            $cat_info_mixed_array=$this->CategoryModel->getCategoriesArray();
            $sub_cat_info=$this->SubCatModel->fetchSubcatInfoBySubCatId($sub_cat_id);
            
            $cat_list=array();
            foreach ($cat_info_mixed_array as $cat) {
            	$cat_list[$cat['cat_id']]=$cat['cat_name'];
            }

            $this->load->view('admin/common/head', ['data' => $page_data]);
            $this->load->view('admin/common/nav',['id' => $id]);
            $this->load->view('admin/subcat/update',['cat_list'=>$cat_list,'sub_cat_info'=>$sub_cat_info]);
            $this->load->view('admin/common/footer');
        }
    }

	public function remove($sub_cat_id)
	{
		if($this->SubCatModel->DeleteSubCat($sub_cat_id)){
			$the_message='<strong>Success!</strong> The Sub category <strong>'.$this->input->post("sub_cat_name").'</strong> and it&quot;s associated products are removed successfully.';
			$this->session->set_flashdata('bg_sys_msg',alert_style('success',$the_message));

			return redirect('SubCategories');
		}else{
			return redirect('SubCategories');
		}	
	}

	public function add_action(){
		if(isset($_POST)){
			if($this->SubCatModel->AddSubCat($this->input->post())){
				$the_message='<strong>Success!</strong> The Sub category <strong>'.$this->input->post("sub_cat_name").'</strong> is added successfully.';
					$this->session->set_flashdata('bg_sys_msg', alert_style('success',$the_message));

				return redirect('SubCategories/add','refresh');
			}
			else
			{
				return redirect('SubCategories/add','refresh');
			}	
		}
		else
		{
			return redirect('SubCategories/add','refresh');
		}
	}


	public function doUpdateSubCategory(){
		if (is_logged_in()) {
            if(isset($_POST['btnUpdate'])){
                $data=array();
                $data['cat_id']=$this->security->xss_clean($this->input->post('cat_name'));
                $data['sub_cat_name']=$this->security->xss_clean($this->input->post('sub_cat_name'));
                $data['sub_cat_id']=$this->security->xss_clean($this->input->post('sub_cat_id'));


                if($this->SubCatModel->updateSubCategory($data)){
                    $this->session->set_flashdata('bg_sys_msg',alert_style('success','Sub Category Updated Successfully. !'));
                    return redirect('SubCategories');
                }
                else{
                    $this->session->set_flashdata('bg_sys_msg',alert_style('danger','An Error  Occured while updating data. !'));
                    return redirect('SubCategories');
                }
            }
            else{
                return redirect('SubCategories');
            }
        }
	}	

	public function getCategoriesList(){
		return $this->SubCatModel->FetchCatToList();
	}

	public function getAllSubCat(){
		return $this->SubCatModel->FetchAllSubCat();
	}

	public function getAllSubCatByCatId(){
		if($this->input->post('cat_id')!=-1){
			print_r($this->SubCatModel->fetchSubCatListByCatId($this->input->post('cat_id')));
		}

	}

}

/* End of file sub_categories.php */
/* Location: ./application/controllers/sub_categories.php */