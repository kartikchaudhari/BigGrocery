<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends My_Model {
	public function pull_footer_settings(){
		$sql="SELECT footer_copyright,contact_address,contact_email,contact_phone FROM settings";

		$query=$this->db->query($sql);
		return $query->row_array();
	}
}

/* End of file settingsModel.php */
/* Location: ./application/models/settingsModel.php */