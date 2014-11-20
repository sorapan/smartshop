<?php

class BasketModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function addTobasket($data){

        $this->db->insert('basket',$data);

    }

    function selectAllData(){

        $this->db->select('*');
        $this->db->where('bought','Y');
        return $this->db->get('basket')->result();


    }

    function selectDistintbyproductidOnlyproduct(){

        $this->db->distinct();
        $this->db->where('bought','Y');
        $this->db->where('promotion_id',null);
        $this->db->group_by('product');
        return $this->db->get('basket')->result();

    }

    function selectDistintbyCartid(){

        $this->db->distinct();
        $this->db->where('bought','Y');
        $this->db->where('promotion_id <>','null');
        $this->db->group_by('cartID');
        return $this->db->get('basket')->result();

    }

    function getsumprice($productid){

        $this->db->select_sum('price');
        $this->db->where('product',$productid);
        $this->db->where('bought','Y');
//        $this->db->where('promotionid',null);
        return $this->db->get('basket')->result();

    }


    function getsumunit($productid){

        $this->db->select_sum('unit');
        $this->db->where('product',$productid);
        $this->db->where('promotion_id',null);
        $this->db->where('bought','Y');
        return $this->db->get('basket')->result();

    }

    function getpromotionunit($cartid){

        $this->db->select('*');
        $this->db->where('cartID',$cartid);
        return $this->db->get('basket')->result();

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

    function chkItemByproductId($productId,$userid){

        $this->db->select('*');
        $this->db->where('product',$productId);
        $this->db->where('bought','N');
        $this->db->where('user',$userid);
        $this->db->where('promotion_id',null);
        return $this->db->get('basket')->result();

    }

    function delBasketData($product,$user){

        $this->db->where('product',$product);
        $this->db->where('user',$user);
        $this->db->where('promotion_id',null);
        $this->db->delete('basket');

    }

    function delBasketDataPromotion($promotion,$date,$user){

        $this->db->where('promotion_id',$promotion);
        $this->db->where('date',$date);
        $this->db->where('user',$user);
        $this->db->where('bought','N');
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
        $this->db->group_by('date');
        return $this->db->get('basket')->result();

    }

    function fetchBasketDataByuserId2($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        $this->db->where('bought','N');
        return $this->db->get('basket')->result();

    }

    function fetchBasketBoughtDataByuserId($userid,$cartID){

        $this->db->select('*');
        $this->db->where('user',$userid);
        $this->db->where('cartID',$cartID);
        $this->db->where('bought','Y');
        $this->db->group_by('date');
        return $this->db->get('basket')->result();

    }

    function fetchBasketBoughtDataByuserId2($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        $this->db->group_by('date');
        $this->db->where('bought','N');
        return $this->db->get('basket')->result();

    }

    function fetchdataJoinproductTable($userid){

        $this->db->select('product.id,basket.user,product.name,basket.unit,basket.price,basket.promotion_id,basket.date');
        $this->db->from('basket');
        $this->db->join('product', 'product.id = basket.product');
        $this->db->where('user',$userid);
        $this->db->where('bought','N');
        $this->db->group_by('basket.date');
        return $this->db->get()->result();

    }

    function allPrice($userid){

        $this->db->select_sum('price');
        $this->db->where('bought','N');
        $this->db->where('user',$userid);
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
        $this->db->where('cartID',null);
        $this->db->update('basket',array(
            'cartID' => $cartID
        ));

    }

    function chkProductByProductid($productid){

        $this->db->select('*');
        $this->db->where('product',$productid);
        $this->db->where('cartID',null);
        return $this->db->get('basket')->result();

    }




} 