<?php

class admin_boughtchecker extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('Bought_listModel');
        $this->load->model('BasketModel');
        $this->load->model('Wait_listModel');
        $this->load->model('UsersModel');
        $this->load->model('ProductModel');

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $boughtlistdata = $this->Bought_listModel->selectAllData();

        foreach($boughtlistdata as $key=>$val){

            @$waitlistidcashchecked = $this->Wait_listModel->selectByWaitlistID($val->wait_list_id)[0]->id;
            @$waitlistidcashchecked_img = $this->Wait_listModel->selectByWaitlistID($val->wait_list_id)[0]->bill_dir;
            $boughtlistdata[$key]->cash = isset($waitlistidcashchecked) ? $waitlistidcashchecked : null ;
            $boughtlistdata[$key]->cash_img = isset($waitlistidcashchecked_img) ? $waitlistidcashchecked_img : null ;
            $boughtlistdata[$key]->username = $this->UsersModel->fetchUserData($val->user)[0]->username;

        }

        $data = array(
            'boughtlist_data' => $boughtlistdata,
            'js' => array(
                base_url().'asset/js/admin_boughtchecker.js'
            )
        );

        $this->load->adminpage('boughtchecker',$data);

    }

    function deleteboughtlist(){

        $boughtlist_id = $_POST['boughtlist_id'];
        $user_id = $_POST['user_id'];
        $cart_id = $_POST['cart_id'];
        $this->Bought_listModel->deleteByID($boughtlist_id);
        $this->Wait_listModel->deleteBycartid($cart_id);
        @unlink('bill_img/'.$_POST['bill_img']);
        foreach($this->BasketModel->fetchBasketDataByuserId($user_id) as $val){

            $productmodel = $this->ProductModel->fetchproductdataByproductId($val->product);
            $this->ProductModel->updateProductData($val->product,$productmodel[0]->unit+$val->unit);

        }
        $this->BasketModel->delBasketNoDataByUserid($user_id);
        $this->UsersModel->updateBuyStatusToNone($user_id);
    }

    function boughtcheckerfetchData(){

        $boughtlistdata = $this->Bought_listModel->selectAllData();

        foreach($boughtlistdata as $key=>$val){

            @$waitlistidcashchecked = $this->Wait_listModel->selectByWaitlistID($val->wait_list_id)[0]->id;
            @$waitlistidcashchecked_img = $this->Wait_listModel->selectByWaitlistID($val->wait_list_id)[0]->bill_dir;
            $boughtlistdata[$key]->cash = isset($waitlistidcashchecked) ? $waitlistidcashchecked : null ;
            $boughtlistdata[$key]->cash_img = isset($waitlistidcashchecked_img) ? $waitlistidcashchecked_img : null ;
            $boughtlistdata[$key]->username = $this->UsersModel->fetchUserData($val->user)[0]->username;
            $boughtlistdata[$key]->timetime = time();

        }

        echo json_encode($boughtlistdata);

    }

} 