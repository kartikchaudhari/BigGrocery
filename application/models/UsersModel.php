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
		$uname=$data['uname'];
		$pass=$data['pass'];
		$str="SELECT user_id FROM users WHERE email='$uname' OR contact='$uname' AND password='$pass'";
		$result=$this->db->query($str);
		return $result->row_array()['user_id'];
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

	public function getUserInfoByEmail($email){
		$q = $this->db->get_where('users', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
	}

	public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('user_id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }

	public function insertToken($user_id)
    {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id; 
    }

	public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn, 
            'tokens.user_id' => $uid), 1);                         
               
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }   
    }

    public function updatePassword($post)
    {   
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('users', array('password' => $post['pass'])); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    }

}

/* End of file UsersModel.php */
/* Location: ./application/models/UsersModel.php */