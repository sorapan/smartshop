<?php

class product extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
    }

    function index($main=null,$sub=null){

//        $productdata = $this->ProductModel->fetchproductdata();
        $mt = $this->TypeModel->fetchMainType();

//        echo 'main=> '.$main." ";
//        echo 'sub=> '.$sub;

        $productdata = $this->ProductModel->fetchproductBySubType($sub,$main);

        $data = array(
            'css' => array(
              base_url().'asset/css/product.css'
            ),
            'p_data'=>$productdata,
            'mt_data'=>$mt
        );
        $this->load->layout1('product',$data);

    }

    function fetchMain(){

        $var = $this->TypeModel->fetchMainType();
        $arr = array();
        foreach($var as $val){
            $arr[$val->id] = $val->name;
        }
        echo json_encode($arr);

    }

    function fetchsub($id = null){

        $var = $this->TypeModel->fetchSubTypeByMainType($id);
        $arr = array();
        foreach($var as $val){
            $arr[$val->id] = $val->name;
        }
        echo json_encode($arr);

    }

} 