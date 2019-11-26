<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteModel extends My_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getKitchenSubCategories(){
		$query=$this->db->query("SELECT * FROM sub_categories WHERE cat_id=1");
		return $query->result_array();
	}

	public function getPersonalCareSubCategories(){
		$query=$this->db->query("SELECT * FROM sub_categories WHERE cat_id=2");
		return $query->result_array();
	}
	
	public function getHouseHoldSubCategories(){
		$query=$this->db->query("SELECT * FROM sub_categories WHERE cat_id=3");
		return $query->result_array();
	}

	/*
		auoload function to load all the website  settings before site loads.
	 */
	public function loadSiteWideSettings(){
		$query=$this->db->query("SELECT * FROM settings");

		return $query->row_array();

	}
}

/* End of file SiteModel.php */
/* Location: ./application/models/SiteModel.php */