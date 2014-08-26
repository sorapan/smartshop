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
            'wait_listdata' => $waitingdata
        );

        foreach($waitingdata as $w_key=>$w_val){

            $user = $this->UsersModel->fetchUserData($w_val->user)[0]->username;
            $data['wait_listdata'][$w_key]->username = $user;

        }

        $this->load->adminpage('boughtlist',$data);

    }

} 