<?php

class admin_promotion extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
        $this->load->model('BasketModel');
        $this->load->model('PromotionModel');

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index($main=null,$sub=null){

        $mt = $this->TypeModel->fetchMainType();
        $productdata = $this->ProductModel->fetchproductBySubType($sub,$main);

        $data = array(
            'p_data'=>$productdata,
            'mt_data'=>$mt,
            'js' => array(
                base_url().'asset/js/admin_productmanage.js',
                base_url().'asset/js/admin_product_uploadimg.js',
                base_url().'asset/js/admin_product_.js',
                base_url().'asset/js/admin_promotion.js'
            )
        );

        foreach($productdata as $key => $val){

            if($val->img == ""){
                $data['p_data'][2]->img = "http://www.parentcenterhub.org/wp-content/uploads/2014/03/No-Image-.jpg";
            }
        }

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
        $this->load->adminpage('createpromotion',$data);

    }

    function fetchproductdataforpromotion(){

        $productid = $_POST['productid'];
        $data = $this->ProductModel->fetchproductdataByproductId($productid);
        $maintype = $this->TypeModel->MainTypeFromId($data[0]->subtype);
        $subtype = $this->TypeModel->SubTypeFromId($data[0]->subtype);
        $data[0]->maintype = $maintype->name;
        $data[0]->subtype = $subtype->name;
        echo json_encode($data);

    }

    function fetchproductbyword(){

        echo json_encode($this->ProductModel->fetchproductByWord($_POST['word']));

    }

    function addpromotion(){

        $promotion_list = $_POST['promotion_list'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $detail = $_POST['detail'];
        $promotion_list_count = array();

        $this->PromotionModel->addpromotion_list(array(
            'promotion_name' => $name,
            'price' => $price,
            'detail' => $detail
        ));

        $promotionlist_id =  $this->PromotionModel->promotionlist_id();

        foreach($promotion_list as $val){

            @$promotion_list_count[$val] += 1;
            // Maybe bug...

        }

        foreach(array_unique($promotion_list) as $val){

            $this->PromotionModel->addpromotion_product(array(
                'productid' => $val,
                'promotionid' => $promotionlist_id,
                'unit' => $promotion_list_count[$val]
            ));

        }

    }

} 