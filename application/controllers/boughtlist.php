<?php

class boughtlist extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model("ProductModel");
        $this->load->model("TypeModel");
        $this->load->model("Wait_listModel");
        $this->load->model("Bought_listModel");
        $this->load->model("UsersModel");
        $this->load->model("BasketModel");
        $this->load->model("PromotionModel");

    }

    function index(){

        $userid = $this->session->userdata('user_id');
        $waitingdata = $this->Wait_listModel->selectAllDataJoinBoughtlistByUserid($userid);
        $waitingdatay = $this->Wait_listModel->selectAllDataJoinBoughtlistByUseridVerified($userid);

        $data = array(
            'wait_listdata' => $waitingdata,
            'wait_listdatay' => $waitingdatay,
            'js' => array(
                base_url().'asset/js/boughtlist.js'
            ));

        $this->load->layout1('boughtlist',$data);

    }

    function basket_detail(){

        $dataWasBought = $this->BasketModel->fetchBasketBoughtDataByuserId($_POST['userid'],$_POST['cartid']);
        foreach($dataWasBought as $key => $val){

            if($val->price != 0){
                $data[$key]['productname'] = $this->ProductModel->fetchproductdataByproductId($val->product)[0]->name;
                $data[$key]['unit'] = $val->unit;
                $data[$key]['price'] = $val->price;
                $data[$key]['img'] = $this->ProductModel->fetchproductdataByproductId($val->product)[0]->img;
            }else{
                $data[$key]['productname'] = 'โปรโมชั่น : '.$this->PromotionModel->fetchPromotionlistByPromotionId($val->promotion_id)[0]->promotion_name;
                $data[$key]['unit'] = 1;
                $data[$key]['price'] = $this->PromotionModel->fetchPromotionlistByPromotionId($val->promotion_id)[0]->price;

                $promotion_product_data = $this->PromotionModel->fetchPromotionWithProductData2($val->promotion_id);
                $data[$key]['inpromotion'] = array();
//                var_dump($promotion_product_data);

                foreach($promotion_product_data as $v){

                    array_push($data[$key]['inpromotion'], $this->PromotionModel->fetchPromotionWithProductData3($v->productid)[0]);

                }

                $data[$key]['img'] = null;
            }

        }
        echo json_encode($data);

    }

} 