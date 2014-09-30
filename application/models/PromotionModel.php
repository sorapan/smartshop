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

    function fetchPromotiondataByPromotionID($promotion_id){

        $this->db->select('*');
        $this->db->from('promotion_product');
        $this->db->where('promotionid',$promotion_id);
        return $this->db->get()->result();

    }

    function fetchPromotionWithProductData($promotion_id){

        $this->db->select('*');
        $this->db->from('promotion_product');
        $this->db->join('product','promotion_product.productid = product.id');
        return $this->db->get()->result();

    }

} 