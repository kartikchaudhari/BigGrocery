
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends My_Model {

	public function getProducts(){
		$query=$this->db->query("SELECT * FROM sub_categories");
		return $query->result_array();
	}

}

/* End of file test.php */
/* Location: ./application/models/test.php */
?>