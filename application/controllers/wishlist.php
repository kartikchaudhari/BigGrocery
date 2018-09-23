<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ProductsModel');
	}

	
	//check if user logged in or not
	public function isLoggedIn(){
		
		if ($this->session->userdata('bg_sys_ss_user_id')) {
			return true;
		}
		else{
			return false;
		}
	}


	public function AddToWishList(){
		if ($this->isLoggedIn()) {
			$product_id=$this->input->post('product_id');
			$user_id=$this->session->userdata('bg_sys_ss_user_id');

			$data=array('product_id' =>$product_id,'user_id'=>$user_id);
			
			if($this->ProductsModel->addProductToWishList($data)){
				echo "The Selected product is Added to your wishlist";
			}
			else{
				echo "An error occured while proccessing query.";
			}
		}
		else{
			echo " Plese Login to add this Product to wishlist.";
		}
	}

	public function removeFromWishList(){
		if ($this->isLoggedIn()) {
			$product_id=$this->input->post('product_id');
			$user_id=$this->session->userdata('bg_sys_ss_user_id');

			$data=array('product_id' =>$product_id,'user_id'=>$user_id);

			if ($this->ProductsModel->removeProductFromWishList($data)) {
				echo "Seleted Product is Remove from wishlist.";
			}
			else{
				echo "An error occured while proccessing query.";
			}
		}		
	}
}

/* End of file wishlist.php */
/* Location: ./application/controllers/wishlist.php */