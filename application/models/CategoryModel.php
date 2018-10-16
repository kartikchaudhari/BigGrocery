<?php 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends My_Model {

	public function getCategories(){
		$this->db->order_by('cat_id', 'ASC');
		$query=$this->db->get('categories');
		return $query->result();
	}

}

/* End of file CategoryModel.php */
/* Location: ./application/models/CategoryModel.php */
?>