<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OffersModel extends My_Model {
	public function getOfferedProducts($SubCatId){
		$query=$this->db->query("SELECT * FROM products WHERE has_offers=1 AND sub_cat_id=$SubCatId");
		return $query->result_array();
	}	
}

/* End of file OffersModel.php */
/* Location: ./application/models/OffersModel.php */