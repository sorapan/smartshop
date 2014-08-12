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


    function basket(){

        $user_session = $this->session->userdata('username');
        if($user_session !== "user"){
            echo "แอดมินไม่สามารถซื้อสินค้าได้";
        }else{

            $product = $this->ProductModel->fetchproductdataByproductId($_POST['productid']);
            $product_price = $product[0]->price;
            $product_name = $product[0]->name;

            $data = array(
                'product' => $_POST['productid'],
                'unit' => $_POST['want'],
                'user' => $this->session->userdata('user_id'),
                'price' => $_POST['want']*$product_price,
                'date' => time()
            );
            $this->BasketModel->addTobasket($data);

        }

    }

    function inbasket(){

        $inbasket = $this->BasketModel->fetchBasketDataByuserId($this->session->userdata('user_id'));
        $product = $this->ProductModel->fetchproductdataByproductId($inbasket[0]->product);
        $data = array(


            'name' => $product[0]->name,
            'unit' => $inbasket[0]->unit
        );
        echo json_encode($data);

    }

} 