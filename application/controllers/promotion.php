<?php

class promotion extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
        $this->load->model('BasketModel');
        $this->load->model('PromotionModel');

    }

    function index(){

        $prom_list = $this->PromotionModel->fetchPromotionlist();
        $data = array(
            'promotionlist' => $prom_list,
            'js' => array(
                base_url().'asset/js/promotion.js'
            )
        );

        foreach($data['promotionlist'] as $prom_list_key => $prom_list_val){
            $prom_list_val->promotiondata = $this->PromotionModel->fetchPromotiondataByPromotionID($prom_list_val->id);
        }

        foreach($data['promotionlist'] as $val){
            foreach($val->promotiondata as $v){
                $v->productdata = $this->ProductModel->fetchproductdataByproductId($v->productid);
            }
        }

        $this->load->layout1('promotion',$data);

    }

    function buy_promotion(){

        $userid = $this->session->userdata('user_id');
        $this->BasketModel->clearBasketDataByUserid($userid);
        $promotion_data = $this->PromotionModel->fetchPromotiondataByPromotionID($_POST['promotion_id']);
//        $promotion_count = $this->PromotionModel->countPromotiondataByPromotionID($_POST['promotion_id']);
        foreach($promotion_data as $val){
            $this->BasketModel->addTobasket(array(
                'user' => $userid,
                'product' => $val->productid,
                'unit' => $val->unit,
                'price' => '0',
                'date' => time(),
                'promotion_id' => $val->promotionid
            ));
        }



    }

} 