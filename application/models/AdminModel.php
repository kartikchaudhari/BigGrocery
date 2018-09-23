<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends My_Model {

	public function getAdminLoginData($UserName,$Password){
		$query=$this->db->query("SELECT * FROM admin WHERE username='".$UserName."' AND password='".$Password."'");
		return $query->row()->admin_id;
	}
}
/* End of file AdminModel.php */
/* Location: ./application/models/AdminModel.php */
?>