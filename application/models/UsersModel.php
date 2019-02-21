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

	public function FethcUserInfoForOrder($UserId){
		$query=$this->db->query("SELECT `fname`,`lname`,`email`,`contact`,`delivery_address` FROM `users` WHERE user_id=".$UserId);
		return $query->row_array();
	}

	public function FetchUserName($UserId){
		$query=$this->db->query("SELECT `fname`,`lname` FROM `users` WHERE user_id=".$UserId);
		return $query->row_array();
	}

	public function updateProfileInfo($data,$userId){
		$data = array('fname' => trim($data['fname']),
					  'lname' => trim($data['lname']),
					  'email' => trim($data['email']),
					  'contact' =>trim($data['contact']),
					  'delivery_address' =>trim($data['daddress']),
					  'address' =>trim($data['address'])
					  );
		$where = "user_id =".$userId;
		$str=$this->db->update_string('users', $data, $where);
		if ($this->db->query($str)) {
			return  true;
		}else{
			return false;
		}

	}
	public function checkAddressStatus($UserId){

		$query=$this->db->query("SELECT address FROM users  WHERE address IS NULL AND user_id=".$UserId);
		if (!empty($query->result())) {
			return true;			
		}
		else{
			return false;
		}

	}

	public function WishListCount($UserId){
		$query=$this->db->query("SELECT COUNT(products.product_id) FROM products,wishlist WHERE products.product_id=wishlist.product_id AND wishlist.user_id=".$UserId."");
		return $query->row_array()['COUNT(products.product_id)'];
	}

}

/* End of file UsersModel.php */
/* Location: ./application/models/UsersModel.php */