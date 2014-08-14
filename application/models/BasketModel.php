<?php

class BasketModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function addTobasket($data){

        $this->db->insert('basket',$data);

    }

    function updateTobasket($productid,$userid,$unit,$price){

        $data = array(

            'unit' => $unit,
            'price' => $price,
            'date' => time()

        );

        $this->db->where('product', $productid);
        $this->db->where('user', $userid);
        $this->db->update('basket', $data);

    }

    function chkItemByproductId($productId){

        $this->db->select('*');
        $this->db->where('product',$productId);
        return $this->db->get('basket')->result();

    }

    function delBasketData($product,$user){

        $this->db->where('product',$product);
        $this->db->where('user',$user);
        $this->db->delete('basket');

    }

    function fetchBasketDataByuserId($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        return $this->db->get('basket')->result();

    }

    function fetchdataJoinproductTable($userid){

        $this->db->select('basket.id,basket.user,product.name,basket.unit,basket.price');
        $this->db->from('basket');
        $this->db->join('product', 'product.id = basket.product');
        $this->db->where('user',$userid);
        return $this->db->get()->result();

    }

    function allPrice($userid){

        $this->db->select_sum('price');
        return $this->db->get('basket')->result();

    }

} 