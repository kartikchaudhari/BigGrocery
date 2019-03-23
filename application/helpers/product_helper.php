<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	function getCatNameByCatId($CatId){
        $ci=&get_instance();
        $ci->load->model('ProductsModel');
        
        $data=$ci->ProductsModel->returnCategoryName($CatId);
        
        if($data){
            return $data['cat_name'];
        }
        else{
            return " ";
        }
    }

    function getSubCatNameBySubCatId($SubCatId){
		$ci=&get_instance();
        $ci->load->model('ProductsModel');
        
        $data=$ci->ProductsModel->returnSubCategoryName($SubCatId);
        
        if($data){
            return $data['sub_cat_name'];
        }
        else{
            return " ";
        }
	}

    function isVegNonVeg($type){
        switch ($type) {
            case 0:
                return "<img src='".base_url('assets/images/veg.png')."' title='Veg Product' height='18px' width='18px'>";
                break;
            
            case 1:
                return "<img src='".base_url('assets/images/non-veg.png')."' title='Non-Veg Product' height='18px' width='18px'>";
                break;
            
            case 2:
                return "<div style='postion:relative;height:20px;width:18px;'></div>";
                break;
            
            default:
                return " ";
                break;
        }
    }

    function isAvailableInStock($status){
        switch ($status) {
            case 0:
                return "<span class='text-danger'>Not available</span>";
                break;
            case 1:
                return "<span class='text-success'>Available</span>";
            default:
                return "<span class='text-danger'>Not available</span>";
                break;
        }
    }

    function checkOffers($hasOffersStatus,$ProductId){
        if ($hasOffersStatus==1) {
            return  "<div class='offer'><p><span>Offer</span></p></div>";
        }
    }

    function checkFavourites($FavouritesStatus,$ProductId){
        if ($FavouritesStatus==0) {
            return "<img class='btnWish' src='".base_url('assets/images/wished.png')."' style='cursor:pointer;height:13px;width:13px;' data-pid=".$ProductId.">";
        }   
        else{
            return "<img class='btnWish' src='".base_url('assets/images/wish.png')."' style='cursor:pointer;height:13px;width:13px;' data-pid=".$ProductId.">";
        }
    }

    function isFavouriteProduct($ProductId,$UserId){
        $ci=&get_instance();
        $ci->load->model('ProductsModel');
        
        $data=$ci->ProductsModel->returnProductFavouriteStatus($ProductId,$UserId);
        if($data!=NULL){
            return 0;
        }
        else{
            return 1;
        }   
    }

?>