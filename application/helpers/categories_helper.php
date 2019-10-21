<?php 

    function countSubCategoryByCategory($cat_id){
        $ci=&get_instance();
        $ci->load->model('SubCatModel');
        $data=$ci->SubCatModel->fetchSubCatCountByCatId($cat_id);
        if($data>0){
            return $data['sub_cat_count'];
        }
        else{
            return 0;
        }
    }

    function countProductByCategory($cat_id){
        $ci=&get_instance();
        $ci->load->model('ProductsModel');
        $data=$ci->ProductsModel->getProductCountByCategory($cat_id);
        if($data>0){
            return $data['product_count'];
        }
        else{
            return 0;
        }
    }
?>