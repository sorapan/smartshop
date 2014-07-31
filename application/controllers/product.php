<?php

class product extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
    }

    function index(){

        $productdata = $this->ProductModel->fetchproductdata();
        $mt = $this->TypeModel->fetchMainType();

        $data = array(
            'css' => array(
              base_url().'asset/css/product.css'
            ),
            'p_data'=>$productdata,
            'mt_data'=>$mt
        );
        $this->load->layout1('product',$data);

    }

} 