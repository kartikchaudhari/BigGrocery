<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_Controller {

	public function index()
	{
		$this->load->library('payumoney');
		$payment=new payumoney();
		print_r($payment->getData());
		//echo ($this->session->userdata('bg_sys_ss_user_id'))?$this->session->userdata('bg_sys_ss_user_id'):0;
	}

	public function enc(){
		
	}

	public function post(){
		echo "<pre>";
		print_r($this->input->post());
	}

	public function get(){
		$this->load->helper('users');
		echo "<pre>";
		print_r(getUserInfo(5));
	}

	public function user_id(){
		$this->load->model('CartModel');
		echo $this->CartModel->returnUserId(2);
	}

	public function kac(){
		$this->load->model('OrderModel');
		$a=array('cart_id' => 52,
    				'total_amount' => 833,
    				'delivery_address' => 'No address',
    				'payment_status' => 'pending');
		echo $this->OrderModel->createOrder($a);
	}

	public function rec(){
		$this->load->view('receipt');
	}

	public function x(){
		$this->load->model('SubCatModel');
		$data=$this->SubCatModel->FetchCatToList();
		echo "<select>";
		for ($i=0; $i <count($data); $i++) { 
			echo "<option value='".$data[$i]['cat_id']."'>".$data[$i]['cat_name']."</option>";	
		}
	
		echo "</select>";
	}


	public function delsubcat(){
		$this->load->model('SubCatModel');
		echo $this->SubCatModel->DeleteSubCat(42);
	}

	public function tget($i,$j,$k){
		echo $i."==".$j."==".$k;
	} 

	public function olist(){
		$this->load->model('OrderModel');
		echo "<pre>";
		print_r($this->OrderModel->getOrderListByUserId(5));
		echo "</pre>";

	}

	public function json(){
		$string='[{"id":2,"name":"Sprite","summary":"Sprite","price":63,"quantity":"7","image":"http://localhost/BigGrocery/product_images/thumb/sprite.jpg"},{"id":4,"name":"Fanta Soft Drink - Orange Flavour","summary":"Fanta Soft Drink - Orange Flavour","price":56,"quantity":"7","image":"http://localhost/BigGrocery/product_images/thumb/fanta.jpg"}]';
		$json_decoded_array=json_decode($string, $assoc_array = true);
		echo "<table border='1'>";
		echo "<tr>
					<th>Quantity</th>
					<th>Product</th>
					<th>Product Price</th>
			  </tr>";
		for ($i=0; $i <count($json_decoded_array); $i++) { 
			echo "<tr>
					<td align='center'>".$json_decoded_array[$i]['quantity']."</td>
					<td>".$json_decoded_array[$i]['name']."</td>
					<td align='center'>".$json_decoded_array[$i]['price']."</td>
				  </tr>";
		}
		echo "</table>";
	}

	public function countRow(){
		$this->load->model('OrderModel');
		echo "<pre>";
		print_r($this->OrderModel->countTotalOrderRows(5,0,5));
	}

	

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */