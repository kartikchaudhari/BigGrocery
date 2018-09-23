<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartModel extends My_Model {
	public function addToCart($data){
		$this->db->insert('cart',$data);
		return $this->db->insert_id();	
	}

	public function getCartData($cartId){
		$query=$this->db->query('SELECT * FROM cart WHERE cart_id='.$cartId);
		return $query->result_array();
	}

	public function returnUserId($cartId){
		$query=$this->db->query('SELECT user_id FROM cart WHERE cart_id='.$cartId);
		return $query->row()->user_id;	
	}
}

/* End of file CartModel.php */
/* Location: ./application/models/CartModel.php */