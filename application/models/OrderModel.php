<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends My_Model {
	public function createOrder($OrderData){
		$this->db->insert('orders',$OrderData);
		return $this->db->insert_id();
	}

	public function updateOrderPaymentStatus($CartId,$Status){
		if ($Status==0) {
			$data=array('payment_status'=>'pending');
			$where="cart_id=".$CartId;

			$query=$this->db->update_string('orders',$data,$where);
			$this->db->query($query);	
		}else{
			$data=array('payment_status'=>'success');
			$where="cart_id=".$CartId;

			$query=$this->db->update_string('orders',$data,$where);
			$this->db->query($query);
		}
		
	}

	public function getOrderListByUserId($UserId,$limit,$start){

		$query=$this->db->query("SELECT cart.`cart_id`,cart.`cart_conetents`,cart.`total_qty`,cart.`total_price`,orders.`order_date`,orders.`payment_status` FROM orders,cart WHERE orders.`cart_id`=cart.`cart_id` AND cart.`user_id`=$UserId ORDER BY orders.`order_date` DESC LIMIT $limit,$start");
		return $query->result_array();
	}

	// 	public function getOrderListByUserId($UserId){

	// 	$query=$this->db->query("SELECT cart.`cart_id`,cart.`cart_conetents`,cart.`total_qty`,cart.`total_price`,orders.`order_date`,orders.`payment_status` FROM orders,cart WHERE orders.`cart_id`=cart.`cart_id` AND cart.`user_id`=$UserId ORDER BY orders.`order_date` DESC");
	// 	return $query->result_array();
	// }

	public function getCountOrderListByUserId($UserId){
		$query=$this->db->query("SELECT cart.`cart_conetents`,cart.`total_qty`,cart.`total_price`,orders.`order_date`,orders.`payment_status` FROM orders,cart WHERE orders.`cart_id`=cart.`cart_id` AND cart.`user_id`=".$UserId." ORDER BY orders.`order_date` DESC");
		return count($query->result_array());
	}

	public function countTotalOrderRows($UserId,$limit,$start){
		$query=$this->db->query("SELECT COUNT(orders.order_id)  AS total_orders FROM orders,cart WHERE orders.`cart_id`=cart.`cart_id` AND cart.`user_id`=".$UserId." LIMIT ".$limit.",".$start);
		return $query->row()->total_orders;
	}

	public function getOrderConents($orderId){
		$this->db->select('cart_conetents');
		$this->db->where('cart_id',$orderId);
		$this->db->from('cart');
		$query=$this->db->get();
		
		return $query->result_array();
	}

	public function getOrderInfo($orderId){
		$query=$this->db->query("SELECT total_amount,order_date FROM orders WHERE cart_id=".$orderId);
		return $query->row_array();
	}
}

/* End of file OrderModel.php */
/* Location: ./application/models/OrderModel.php */
?>