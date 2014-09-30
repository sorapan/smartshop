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
            'promotionlist' => $prom_list
        );

        foreach($data['promotionlist'] as $prom_list_key => $prom_list_val){

            $prom_list_val->promotiondata = $this->PromotionModel->fetchPromotiondataByPromotionID($prom_list_val->id);

        }


        foreach($data['promotionlist'] as $val){

            foreach($val->promotiondata as $v){

                $v->productdata = $this->ProductModel->fetchproductdataByproductId($v->productid);

            }

        }

//        foreach($data['promotionlist'] as $val){
//
//            foreach($val->promotiondata as $v){
//
//                var_dump($v->productdata);
//                echo "<br>-------------<br>";
//
//            }
//
//            echo "<br>XXXXXXXXXXXXXXXXXXXXXX<br><br>";
//
//        }


        $this->load->layout1('promotion',$data);

    }



} 