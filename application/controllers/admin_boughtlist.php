<?php

class admin_boughtlist extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model("ProductModel");
        $this->load->model("PromotionModel");
        $this->load->model("TypeModel");
        $this->load->model("Wait_listModel");
        $this->load->model("Bought_listModel");
        $this->load->model("UsersModel");
        $this->load->model("BasketModel");

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $waitingdata = $this->Wait_listModel->selectAllData();

        $data = array(
            'wait_listdata' => $waitingdata,
            'js' => array(
                base_url().'asset/js/admin_boughtlist.js'
        ));

        foreach($waitingdata as $w_key=>$w_val){

            $bought_list_data = $this->Bought_listModel->selectDataByUserID($data['wait_listdata'][$w_key]->user,$data['wait_listdata'][$w_key]->id);
            if(isset($bought_list_data[0])){
                $boughtdata = $bought_list_data[0];
                $data['wait_listdata'][$w_key]->price = $boughtdata->price;
                $data['wait_listdata'][$w_key]->send = $boughtdata->sendby;
            }

            $user = $this->UsersModel->fetchUserData($w_val->user)[0];
            $data['wait_listdata'][$w_key]->username = $user->username;
            $data['wait_listdata'][$w_key]->userid = $user->id;

        }
        $this->load->adminpage('boughtlist',$data);

    }

    function bought_verify(){

        $this->Bought_listModel->bought_verify($_POST['userid'],$_POST['cartid']);
        $this->Wait_listModel->bought_verify($_POST['userid'],$_POST['cartid']);

    }

    function basket_detail(){

        $dataWasBought = $this->BasketModel->fetchBasketBoughtDataByuserId($_POST['userid'],$_POST['cartid']);
        foreach($dataWasBought as $key => $val){

            $data[$key]['productname'] = $this->ProductModel->fetchproductdataByproductId($val->product)[0]->name;
            $data[$key]['unit'] = $val->unit;
            if($val->price != 0) $data[$key]['price'] = $val->price;
            else @$data[$key]['price'] = 'ราคาโปรโมชั่น : '.$this->PromotionModel->fetchPromotionlistByPromotionId($val->promotion_id)[0]->price;

        }
        echo json_encode($data);

    }

} 