<?php

class PromotionModel extends CI_Model {

    function __construct(){

        parent::__construct();

    }

    function addpromotion_list($data){

        $this->db->insert('promotion_list',$data);

    }

    function promotionlist_id(){

        $this->db->select_max('id');
        $this->db->from('promotion_list');
        return $this->db->get()->result()[0]->id;

    }

    function addpromotion_product($data){

        $this->db->insert('promotion_product',$data);

    }

    function fetchPromotionlist(){

        $this->db->select('*');
        $this->db->from('promotion_list');
        return $this->db->get()->result();

    }

    function fetchPromotionlistByPromotionId($promotionid){

        $this->db->select('*');
        $this->db->from('promotion_list');
        $this->db->where('id',$promotionid);
        return $this->db->get()->result();

    }

    function fetchPromotiondataByPromotionID($promotion_id){

        $this->db->select('*');
        $this->db->from('promotion_product');
        $this->db->where('promotionid',$promotion_id);
        return $this->db->get()->result();

    }

    function fetchPromotiondataByPromotionIDAndProductID($promotion_id,$product_id){

    $this->db->select('*');
    $this->db->from('promotion_product');
    $this->db->where('promotionid',$promotion_id);
    $this->db->where('productid',$product_id);
    return $this->db->get()->result();

}

    function countPromotiondataByPromotionID($promotion_id){


        $this->db->where('promotionid', $promotion_id);
        $this->db->from('promotion_product');
        return $this->db->count_all_results();

    }

    function fetchPromotionWithProductData($promotion_id){

        $this->db->select('*');
        $this->db->from('promotion_product');
        $this->db->join('product','promotion_product.productid = product.id');
        return $this->db->get()->result();

    }

    function deletePromotionByID($id){

        $this->db->delete('promotion_list',array(
            'id' => $id
        ));

        $this->db->delete('promotion_product',array(
            'promotionid' => $id
        ));

    }

} 