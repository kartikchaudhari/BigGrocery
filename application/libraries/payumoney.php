<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payumoney {
	public $data=array();	

	public function __construct(){

		$this->data['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	    $this->data['action'] = PAYU_BASE_URL . '/_payment';        
	}

	public function getData(){
		return $this->data;
	}
}
?>