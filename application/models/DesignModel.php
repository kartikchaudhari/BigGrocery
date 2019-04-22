<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DesignModel extends My_Model {

	public function insertBanner($data){
		$bannerData = array('name' =>$data['b_name'],'status'=>$data['status']);
		$insertString=$this->db->insert('ad_banner',$bannerData);
		return $insertString;
	}

	public function getBanners(){
		$query = $this->db->get('ad_banner');
		return $query->result_array();
	}

	public function getActiveBannerInfo(){
		$query="SELECT banner_img_id,ad_banner_image.banner_id,banner_image,banner_ad_url FROM `ad_banner_image`,ad_banner WHERE ad_banner_image.banner_id=ad_banner.banner_id AND ad_banner.status=1";
		$result=$this->db->query($query);
		return $result->result_array();
	}
}

/* End of file DesignModel.php */
/* Location: ./application/models/DesignModel.php */