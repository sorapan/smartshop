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
        $prom_data = $this->PromotionModel->fetchPromotionlist();

        $data['promotionlist'] = $prom_list;

        foreach($prom_list as $prom_list_key => $prom_list_val){

            $data['promotionlist'][0]->promotiondata = $this->PromotionModel->fetchPromotiondataByPromotionID($prom_list_val->id);

        }

        foreach($data['promotionlist'] as $key => $val){

            $data['productdata'][0]->promotiondata = $this->PromotionModel->

        }

        $this->load->layout1('promotion',$data);

    }



} 