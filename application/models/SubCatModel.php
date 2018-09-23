<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubCatModel extends My_Model {
	public function FetchCatToList(){
		$query=$this->db->query('SELECT * FROM categories');
		return $query->result_array();
	}

	public function AddSubCat($data){
		return $this->db->insert('sub_categories',$data);
	}

	public function FetchAllSubCat(){
		$query=$this->db->query("SELECT * FROM sub_categories");
		return $query->result_array();
	}

	public function DeleteSubCat($SubCatId){
		return $this->db->query("DELETE FROM sub_categories WHERE sub_cat_id=".$SubCatId);

	}
}

/* End of file SubCatModel.php */
/* Location: ./application/models/SubCatModel.php */