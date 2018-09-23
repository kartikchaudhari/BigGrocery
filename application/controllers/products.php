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
		
		//for tracing 
		/*echo "<pre>";
		print_r($data['products']);*/
		//$this->load->view('products');
		// for ($i=0; $i <count($data['products']); $i++) { 
		// 	echo $data['products'][$i]['product_id'];
		// }
		
		$this->load->view('products',['data'=>$data]);

	}

	public function product_info($ProductId){
		$ProductInfo=$this->ProductsModel->returnProductInfo($ProductId);
		$this->load->view('single',['data'=>$ProductInfo]);
	}

	//For Admin Section:
	//List all the products to the dashboard
	public function viewProducts(){
		$this->load->view('admin/products/view');
	}

	public function add_product(){
		$this->load->view('admin/products/add');	
	}

	public function remove_product(){
		$this->load->view('admin/products/remove');
	}




}

/* End of file products.php */
/* Location: ./application/controllers/products.php */