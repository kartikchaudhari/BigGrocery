<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsModel extends My_Model {

	public function addNewProduct($ProductInfo){
		$insert_string=$this->db->insert_string('products',$ProductInfo);
		if ($this->db->query($insert_string)) {
			return true;
		}else{
			return false;
		}
	}

	public function getAllProducts(){
		$string="SELECT `product_id`, `cat_id`, `sub_cat_id`, `product_name`, `product_image`,`product_price`,`product_stock` FROM `products`";
		$query=$this->db->query($string);
		return $query->result_array();
		
	}

	function get_all_product() {
      $this->datatables->select('`product_id`, `cat_id`, `sub_cat_id`, `product_name`, `product_image`,`product_price`,`product_stock`');
      $this->datatables->from('products');
      
      $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info" data-code="$1" data-name="$2" data-price="$3" data-category="$4">Edit</a>  <a href="javascript:void(0);" class="delete_record btn btn-danger" data-code="$1">Delete</a>','product_id');
      return $this->datatables->generate();
  }

	public function getProductCountByCategory($cat_id){
		$query=$this->db->query("SELECT COUNT(products.product_id) AS 'product_count' FROM products WHERE products.cat_id=$cat_id");
		return $query->row_array();
	}

		public function getProductCountBySubCategory($sub_cat_id){
		$query=$this->db->query("SELECT COUNT(products.product_id) AS 'product_count' FROM products WHERE products.sub_cat_id=$sub_cat_id");
		return $query->row_array();
	}


	public function getAllProductsByCategory($cat_id){
		$query=$this->db->query("SELECT * FROM products WHERE cat_id=$cat_id");
		return $query->result_array();
	}

	public function getAllProductsBySubCategory($sub_cat_id){
		$query=$this->db->query("SELECT * FROM products WHERE sub_cat_id=$sub_cat_id");
		return $query->result_array();
	}
	

	public function returnCategoryName($CatId){
		$query=$this->db->query("SELECT cat_name FROM categories WHERE cat_id=".$CatId."");
		return $query->row_array();
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
	}

	public function returnWishListProducts($UserId){
		$query=$this->db->query("SELECT * FROM products,wishlist WHERE products.product_id=wishlist.product_id AND wishlist.user_id=".$UserId."");
		return $query->result_array();
	}

	public function returnProductFavouriteStatus($ProductId,$UserId){
			$query=$this->db->query("SELECT wish_id FROM wishlist WHERE product_id=$ProductId AND user_id=$UserId");
			return $query->row_array();
	}

	public function get_searches($search_data){
		$this->db->select('*');
    	$this->db->like('product_name',$search_data);
		return $this->db->get('products', 10)->result_array();
	}
}

/* End of file ProductsModel.php */
/* Location: ./application/models/ProductsModel.php */
?>