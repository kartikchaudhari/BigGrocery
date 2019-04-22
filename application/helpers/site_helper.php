<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function DisplayKitchenSubCategories(){
        $ci=&get_instance();
        $ci->load->model('SiteModel');
        
        $data=$ci->SiteModel->getKitchenSubCategories();
        if($data){
            return $data;
        }
        else{
            return null;
        }
}

function DisplayPersonalCareSubCategories(){
      $ci=&get_instance();
      $ci->load->model('SiteModel');
      
      $data=$ci->SiteModel->getPersonalCareSubCategories();
        if($data){
            return $data;
        }
        else{
            return null;
        }
}

function DisplayHouseHoldSubCategories(){
    $ci=&get_instance();
    $ci->load->model('SiteModel');
    $data=$ci->SiteModel->getHouseHoldSubCategories();
    if($data){
        return $data;
    }
    else{
        return null;
    }
}



/*
    Banner Slider functions
 */
function make_slide_indicators(){
    $ci=&get_instance();
    $ci->load->model('DesignModel');
    
    $output = ''; 
    $result = $ci->DesignModel->getActiveBannerInfo();
    for($i=0;$i<count($result);$i++){
        if ($i==0) {
            $output .= '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';     
        }else{
             $output .= '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';      
        }
    }
    return $output;
}

function make_slides(){
    $ci=&get_instance();
    $ci->load->model('DesignModel');
    
    $output = '';
    $row = $ci->DesignModel->getActiveBannerInfo();
    for($i=0;$i<count($row);$i++){
        if($i == 0){
            $output .= '<div class="item active">';
        }
        else{
            $output .= '<div class="item">';
        }
            $output .= '<a href="'.base_url($row[$i]['banner_ad_url']).'" target="_blank">
                    <img src="'.base_url($row[$i]["banner_image"]).'"/>
                </a>
            </div>';
        }
    return $output;
}   

?>