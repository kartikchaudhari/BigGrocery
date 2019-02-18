<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentModel extends My_Model {
	public function insertPaymentInfo($PaymentInfo){
		return $this->db->insert('payments',$PaymentInfo);
	}

	public function countUserPaymentHistory($UserId){
		//$this->db->where('')
	}
}

/* End of file PaymentModel.php */
/* Location: ./application/models/PaymentModel.php */
?>