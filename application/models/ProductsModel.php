<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsModel extends My_Model {

	public function getAllProductsBySubCategory($SubCatId){
		$query=$this->db->query("SELECT * FROM products WHERE sub_cat_id=".$SubCatId."");
		return $query->result_array();
	}

	public function returnSubCategoryName($SubCatId){
		$query=$this->db->query("SELECT sub_cat_name FROM sub_categories WHERE sub_cat_id=".$SubCatId."");
		return $query->row_array();
	}

	public function returnProductInfo($ProductId){
		$query=$this->db->query("SELECT * FROM products WHERE product_id=".$ProductId."");
		return $query->result_array();
	}

	public function addProductToWishList($data){
		$insert=$this->db->insert('wishlist',$data);
		return $insert;
	}

	public function removeProductFromWishList($data){
		return $this->db->delete('wishlist',$data);
		//$sql="DELETE FROM wishlist WHERE product_id=".$data['product_id']." AND user_id=".$data['user_id'];
		//return $sql;
		//return $this->db->query($sql);
	}

	public function returnWishListProducts($UserId){
		$query=$this->db->query("SELECT * FROM products,wishlist WHERE products.product_id=wishlist.product_id AND wishlist.user_id=".$UserId."");
		return $query->result_array();
	}

}

/* End of file ProductsModel.php */
/* Location: ./application/models/ProductsModel.php */
?>