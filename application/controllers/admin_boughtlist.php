<?php

class admin_boughtlist extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model("ProductModel");
        $this->load->model("TypeModel");
        $this->load->model("Wait_listModel");
        $this->load->model("Bought_listModel");
        $this->load->model("UsersModel");

    }

    function index(){

        $waitingdata = $this->Wait_listModel->selectAllData();

        $data = array(
            'wait_listdata' => $waitingdata,
            'js' => array(
            base_url().'asset/js/admin_boughtlist.js'
        )
        );

        foreach($waitingdata as $w_key=>$w_val){

            $user = $this->UsersModel->fetchUserData($w_val->user)[0]->username;
            $boughtdata = $this->Bought_listModel->selectDataByUserID($data['wait_listdata'][$w_key]->user)[0];
            $data['wait_listdata'][$w_key]->username = $user;
            $data['wait_listdata'][$w_key]->price = $boughtdata->price;
            $data['wait_listdata'][$w_key]->send = $boughtdata->sendby;

        }

        $this->load->adminpage('boughtlist',$data);

    }

} 