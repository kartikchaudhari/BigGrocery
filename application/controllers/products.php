<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends My_Controller {

	public function __construct(){
		parent::__construct();
        
        $this->load->model('ProductsModel');
        $this->load->helper('product');
	}



	public function view_products($SubCatid){
		//create a single array
		//that holds the sub_category name 
		//and all the products
		$data=array();

		//insert sub_category name
		$data['sub_cat_name']=getSubCatNameBySubCatId($SubCatid);
		$data['products']=$this->ProductsModel->getAllProductsBySubCategory($SubCatid);
		$this->load->view('products',['data'=>$data]);

	}

	public function product_info($ProductId){
		$ProductInfo=$this->ProductsModel->returnProductInfo($ProductId);
		$this->load->view('single',['data'=>$ProductInfo]);
	}

	//For Admin Section:
	//List all the products to the dashboard
	public function manage_products(){
		$AllProduct=$this->ProductsModel->getAllProducts();
		$data=array('title'=>'Manage Products');
		$this->load->view('admin/common/head',['data'=>$data]);
		$this->load->view('admin/products/view',['data'=>$AllProduct]);
		$this->load->view('admin/common/js');
	}

	


	public function add_product(){
		$this->load->model(['SubCatModel','ProductCatModel']);
		$data=array('title'=>'Add Products');
		$this->load->view('admin/common/head',['data'=>$data]);
		$this->load->view('admin/products/add',['product_cat'=>$this->ProductCatModel->FetchAllCat()]);	
	}

	public function doAddProduct(){
		
		$FullImage=$this->doUploadFullImage();

		$ThumbNail=$this->doUploadThumbnail();
		if (!$FullImage['status']) {
			if (!$ThumbNail['status']) {

				$isProductEdible=($this->input->post('isEdible')?$this->input->post('veg_nonveg'):$this->input->post('isEdible'));

				$ProductsInfo=array(
										'cat_id'=>$this->input->post('product_cat'),
										'sub_cat_id'=>$this->input->post('product_sub_cat'),
										'product_name'=>$this->input->post('product_name'),
										'company_name'=>$this->input->post('product_company'),
										'product_image'=>substr($ThumbNail['full_file_path'],2),
										'product_image_full'=>substr($FullImage['full_file_path'],2),
										'product_weight'=>$this->input->post('product_weight')." ".$this->input->post('weight_unit'),
										'veg_nonveg'=>$isProductEdible,
										'product_desc'=>htmlspecialchars($this->input->post('product_desc')),
										'product_discount'=>$this->input->post('product_discount'),
										'product_price'=>$this->input->post('product_price'),
										'old_price'=>0,
										'has_offers'=>$this->input->post('has_offers'),
										'product_status'=>1,
										'product_stock'=>$this->input->post('product_stock')
									);
					if ($this->ProductsModel->addNewProduct($ProductsInfo)) {
						$this->session->set_flashdata('bg_sys_msg', '<strong style="color:green;">The Product is Addedd Successfully..</strong>');
						return redirect('products/add_product');
					}else{
							$this->session->set_flashdata('bg_sys_msg', '<strong style="color:red;">An error while adding Product...</strong>');
						return redirect('products/add_product');
					}
			}	
			else{
				echo "<strong>Full Image: </strong>".$ThumbNail['error'];
			}
		}else{ 
			echo "<strong>Thumbnail Image: </strong>".$FullImage['error'];

		}
	}

	public function doUploadThumbnail(){
		$config['upload_path'] = './product_images/thumb/';
		$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG|JPEG';
		$config['max_size']  = '100';
		$config['max_width']  = '250';
		$config['max_height']  = '250';
		$config['encrypt_name']=TRUE;

		$this->upload->initialize($config);//tnx mate you saved my ass
		
		$this->load->library('upload', $config);
		

		if (!$this->upload->do_upload('product_thumb_image')){
			$error = array('error' => $this->upload->display_errors(),'status'=>1);
			return $error;
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$success=array('full_file_path'=>$config['upload_path'].$data['upload_data']['file_name'],'status'=>0);
			return $success;
		}
	}

	public function doUploadFullImage(){
		$config['upload_path'] = './product_images/full/';
		$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG|JPEG';
		$config['max_size']  = '100';
		$config['max_width']  = '600';
		$config['max_height']  = '600';
		$config['encrypt_name']=TRUE;
		$this->load->library('upload', $config);
		

		if (!$this->upload->do_upload('product_image_full')){
			$error = array('error' => $this->upload->display_errors(),'status'=>1);
			return $error;
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$success=array('full_file_path'=>$config['upload_path'].$data['upload_data']['file_name'],'status'=>0);
			return $success;
		}
	}



	public function remove_product(){
		$this->load->view('admin/products/remove');
	}






}

/* End of file products.php */
/* Location: ./application/controllers/products.php */