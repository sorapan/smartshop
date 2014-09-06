<?php

class product extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
        $this->load->model('BasketModel');
    }

    function index($main=null,$sub=null){

//        $productdata = $this->ProductModel->fetchproductdata();
        $mt = $this->TypeModel->fetchMainType();

//        echo 'main=> '.$main." ";
//        echo 'sub=> '.$sub;

        $productdata = $this->ProductModel->fetchproductBySubType($sub,$main);

        $data = array(
            'css' => array(
                base_url().'asset/css/product_.css'
            ),
            'js' => array(
                base_url().'asset/js/product_.js'
            ),
            'p_data'=>$productdata,
            'mt_data'=>$mt,
        );

        if($main==null){
            $data['mt_name']="ทั้งหมด";
        }else if($sub==null){
            $maintypename = $this->TypeModel->MainTypeFromId($main);
            $data['mt_name']=$maintypename->name;
        }else{
            $maintypename = $this->TypeModel->MainTypeFromId($main);
            $subtypename = $this->TypeModel->SubTypeFromId($sub);
            $data['mt_name']=$maintypename->name;
            $data['st_name']=$subtypename->name;
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

} 