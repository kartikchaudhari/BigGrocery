<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends My_Model {

	public function InsertUserData($UserInfo){
		$data=array(
					'fname' =>$UserInfo['fname'],
					'lname'=>$UserInfo['lname'],
					'email'=>$UserInfo['email'],
					'contact'=>$UserInfo['contact'],
					'password'=>md5($UserInfo['password'])
				);
		if ($this->db->query($this->db->insert_string('users',$data))) {
			return true;
		}
		else{
			return  false;
		}
		
	}

	public function FetchLoginInfo($data){
		$str="SELECT user_id FROM users WHERE email='".$data['uname']."' OR contact='".$data['uname']."' AND password='".$data['pass']."'";
		$query=$this->db->query($str);
		if($query->row()->user_id){
			return $query->row()->user_id;
		}
		else{
			return false;
		}
	}

	public function FethcUserInfo($UserId){
		$query=$this->db->query("SELECT * FROM users WHERE user_id=".$UserId);
		return $query->row_array();
	}

}

/* End of file UsersModel.php */
/* Location: ./application/models/UsersModel.php */