<?php

class product extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
        $this->load->model('BasketModel');
    }

    function index($main=null,$sub=null){

        $mt = $this->TypeModel->fetchMainType();
        $productdata = $this->ProductModel->fetchproductBySubType($sub,$main);

        //index_basket.js

        $data = array(
            'css' => array(
                base_url().'asset/css/product_.css'
            ),
            'p_data'=>$productdata,
            'mt_data'=>$mt,
        );

        if($main==null){
            $data['mt_name']="ทั้งหมด";
        }else if($sub==null){
            $maintypename = $this->TypeModel->MainTypeFromId($main);
            $subtypedata = $this->TypeModel->fetchSubTypeByMainType($main);

            $data['mt_name']=$maintypename->name;
            $data['subtype_data']=$subtypedata;
        }else{
            $maintypename = $this->TypeModel->MainTypeFromId($main);
            $subtypename = $this->TypeModel->SubTypeFromId($sub);
            $subtypedata = $this->TypeModel->fetchSubTypeByMainType($main);
            $data['mt_name']=$maintypename->name;
            $data['st_name']=$subtypename->name;
            $data['subtype_data']=$subtypedata;
        }
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

    function fetchProductWithWord(){

        if(isset($_GET['word'])){

            $mt = $this->TypeModel->fetchMainType();
            $productdata = $this->ProductModel->fetchproductByWord($_GET['word']);
            $data = array(
                'css' => array(
                    base_url().'asset/css/product_.css'
                ),
                'p_data'=>$productdata,
                'mt_data'=>$mt,
            );

            $this->load->layout1('product',$data);

        }

    }

} 