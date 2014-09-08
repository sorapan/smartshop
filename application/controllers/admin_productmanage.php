<?php

class admin_productmanage extends CI_Controller {

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

        $this->load->adminpage('productmanage',$data);

    }

} 