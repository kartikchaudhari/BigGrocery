<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends My_Controller {

	public function index()
	{
		
	}

	public function snacksOffers(){
		return $this->OffersModel->getOfferedProducts(1,2);
	}

}

/* End of file offers.php */
/* Location: ./application/controllers/offers.php */