<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductCatModel extends My_Model {

	public function FetchAllCat(){
		$query=$this->db->query("SELECT * FROM categories");
		return $query->result_array();
	}
}

/* End of file ProductCatModel.php */
/* Location: ./application/models/ProductCatModel.php */
?>