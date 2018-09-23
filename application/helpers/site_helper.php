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


?>