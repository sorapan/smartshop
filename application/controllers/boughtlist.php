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

        $waitingdata = $this->Wait_listModel->selectAllData();
        $waitingdatay = $this->Wait_listModel->selectAllDataVerified();

        $data = array(
            'wait_listdata' => $waitingdata,
            'wait_listdatay' => $waitingdatay,
            'js' => array(
                base_url().'asset/js/boughtlist.js'
            ));

        foreach($waitingdata as $w_key=>$w_val){

            $bought_list_data = $this->Bought_listModel->selectDataByUserID($data['wait_listdata'][$w_key]->user);
            if(isset($bought_list_data[0])){
                $boughtdata = $bought_list_data[0];
                $data['wait_listdata'][$w_key]->price = $boughtdata->price;
                $data['wait_listdata'][$w_key]->send = $boughtdata->sendby;
            }

            $user = $this->UsersModel->fetchUserData($w_val->user)[0];
            $data['wait_listdata'][$w_key]->username = $user->username;
            $data['wait_listdata'][$w_key]->userid = $user->id;

        }

        foreach($waitingdatay as $w_key=>$w_val){

            $bought_list_data = $this->Bought_listModel->selectDataByUserID($data['wait_listdatay'][$w_key]->user);
            if(isset($bought_list_data[0])){
                $boughtdata = $bought_list_data[0];
                $data['wait_listdatay'][$w_key]->price = $boughtdata->price;
                $data['wait_listdatay'][$w_key]->send = $boughtdata->sendby;
            }

            $user = $this->UsersModel->fetchUserData($w_val->user)[0];
            $data['wait_listdatay'][$w_key]->username = $user->username;
            $data['wait_listdatay'][$w_key]->userid = $user->id;

        }

//        print_r($data['wait_listdata']);
        $this->load->layout1('boughtlist',$data);

    }


    function basket_detail(){

        $dataWasBought = $this->BasketModel->fetchBasketBoughtDataByuserId($_POST['userid']);
        foreach($dataWasBought as $key => $val){

            $data[$key]['productname'] = $this->ProductModel->fetchproductdataByproductId($val->product)[0]->name;
            $data[$key]['unit'] = $val->unit;
            $data[$key]['price'] = $val->price;

        }
        echo json_encode($data);

    }

} 