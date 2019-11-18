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

	public function fetchSubcatInfoBySubCatId($sub_cat_id){
		$query=$this->db->query("SELECT * FROM `sub_categories` WHERE sub_cat_id=$sub_cat_id");

		return $query->row_array();
	}

	public function FetchAllSubCat(){
		$query=$this->db->query("SELECT * FROM sub_categories");
		return $query->result_array();
	}

	public function updateSubCategory($data){
        $this->db->where('sub_cat_id', $data['sub_cat_id']);
        $this->db->update('sub_categories', array('cat_id' => $data['cat_id'],'sub_cat_name'=>$data['sub_cat_name']));
        $success = $this->db->affected_rows();

        if(!$success){
            return false;
        }
        return true;
    }

	public function DeleteSubCat($SubCatId){
		$this->db->query("CALL delSubCatAndPrdocuts($SubCatId)");

		return true;

	}

	public function fetchCatIdBySubCatId($sub_cat_id){
		$query=$this->db->query("SELECT cat_id FROM sub_categories WHERE sub_cat_id=$sub_cat_id");
		return $query->row_array();
	}

	public function fetchSubCatListByCatId($CatId){
		$this->db->where('cat_id',$CatId);
		$query=$this->db->get('sub_categories');
		$output='';
		foreach($query->result() as $row){
			$output.='<option value="'.$row->sub_cat_id.'">'.$row->sub_cat_name.'</option>';
		}
		return $output;
	}

	public function fetchSubCatCountByCatId($cat_id){
		$query=$this->db->query("SELECT COUNT(sub_categories.sub_cat_id) AS 'sub_cat_count' FROM sub_categories WHERE sub_categories.cat_id=$cat_id");
		return $query->row_array();
	}
}

/* End of file SubCatModel.php */
/* Location: ./application/models/SubCatModel.php */