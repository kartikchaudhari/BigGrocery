<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends My_Model {

	public function getAdminLoginData($UserName,$Password){

		$where=array('username'=>$UserName,'password'=>$Password);
		$query=$this->db->select('admin_id')
						->where($where)
						->get('admin');

		if($query->row()->admin_id){
			return $query->row()->admin_id;
		}
		else{
			return 0;
		}
	}

	public function getAdminInfo($adminId){
		$query=$this->db->query("SELECT admin_id,email,phone,username FROM admin WHERE admin_id=".$adminId);
		return $query->result_array();
	}
}
/* Location: ./application/models/AdminModel.php */
?>