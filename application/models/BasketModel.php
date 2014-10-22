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
        $this->db->where('bought','N');
        $this->db->where('user',$this->session->userdata('user_id'));
        return $this->db->get('basket')->result();

    }

    function delBasketData($product,$user){

        $this->db->where('product',$product);
        $this->db->where('user',$user);
        $this->db->delete('basket');

    }

    function delBasketNoDataByUserid($userid){

        $this->db->where('user',$userid);
        $this->db->where('bought','N');
        $this->db->delete('basket');

    }

    function clearBasketDataByUserid($user){

        $this->db->where('user',$user);
        $this->db->where('bought','N');
        $this->db->delete('basket');

    }

    function fetchBasketDataByuserId($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        $this->db->where('bought','N');
        return $this->db->get('basket')->result();

    }

    function fetchBasketBoughtDataByuserId($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        $this->db->where('bought','Y');
        return $this->db->get('basket')->result();

    }

    function fetchdataJoinproductTable($userid){

        $this->db->select('product.id,basket.user,product.name,basket.unit,basket.price,basket.promotion_id');
        $this->db->from('basket');
        $this->db->join('product', 'product.id = basket.product');
        $this->db->where('user',$userid);
        $this->db->where('bought','N');
        return $this->db->get()->result();

    }

    function allPrice(){

        $this->db->select_sum('price');
        $this->db->where('bought','N');
        return $this->db->get('basket')->result();

    }

    function updateBoughtDataToY($userid){

        $this->db->where('user',$userid);
        $this->db->where('bought','N');
        $this->db->update('basket',array(
            'bought' => 'Y'
        ));

    }

    function updateCartID($userid,$cartID){

        $this->db->where('user',$userid);
        $this->db->update('basket',array(
            'cartID' => $cartID
        ));

    }

} 