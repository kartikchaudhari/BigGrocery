<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends My_Model {

	public function getCategories(){
		$this->db->order_by('cat_id', 'ASC');
		$query=$this->db->get('categories');
		return $query->result();
	}

	public function getCategoriesArray(){
		$this->db->order_by('cat_id', 'ASC');
		$query=$this->db->get('categories');
		return $query->result_array();
	}

    public function getCategoryInfoByCatId($cat_id){
        $query=$this->db->query("SELECT * FROM `categories` WHERE cat_id=$cat_id");
        return $query->row_array();
    }

    public function updateCategory($data){
        $this->db->where('cat_id', $data['cat_id']);
        $this->db->update('categories', array('cat_name' => $data['cat_name']));
        $success = $this->db->affected_rows();

        if(!$success){
            return false;
        }
        return true;
    }
}

/* End of file CategoryModel.php */
/* Location: ./application/models/CategoryModel.php */
?>