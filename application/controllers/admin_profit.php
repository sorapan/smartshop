<?php

class admin_profit extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('BasketModel');
        $this->load->model('ProductModel');
        $this->load->model('PromotionModel');

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $data = array(
            'js' => array(
                base_url().'asset/js/admin_profit.js'
            )
        );
        $this->load->adminpage('profit',$data);

    }

    function selectdata(){

//        $basket_data = $this->BasketModel->selectAllData();
        $basket_data_distint = $this->BasketModel->selectDistintbyproductidOnlyproduct();
        $send = false;
        $aa = [];

        foreach($basket_data_distint as $distinitkey => $distint_val){

                if(date('n',$distint_val->date) == $_POST['month'] && date('Y',$distint_val->date) == $_POST['year']){
                    if($distint_val->promotion_id == null){
                        $basket_data_distint[$distinitkey]->product_name = $this->ProductModel->fetchproductdataByproductId($distint_val->product)[0]->name;
                        $basket_data_distint[$distinitkey]->price = $this->BasketModel->getsumprice($distint_val->product)[0]->price;
                        $basket_data_distint[$distinitkey]->unit = $this->BasketModel->getsumunit($distint_val->product)[0]->unit == null ? 0 : $this->BasketModel->getsumunit($distint_val->product)[0]->unit;
                    }
                    else{
                        $basket_data_distint[$distinitkey]->product_name = 'โปรโมชั่น : ';
                        $basket_data_distint[$distinitkey]->product_name .= $this->PromotionModel->fetchPromotionlistByPromotionId($distint_val->product)[0]->promotion_name;
                        $basket_data_distint[$distinitkey]->price = $this->PromotionModel->fetchPromotionlistByPromotionId($distint_val->product)[0]->price;
                        $basket_data_distint[$distinitkey]->unit = $this->BasketModel->getpromotionunit($distint_val->cartID)[0]->unit;
                    }
                    $send = true;
                }
        }

        if($send) echo json_encode($basket_data_distint);
        else echo json_encode($aa);


    }


    function select_promotion_data(){

        $basket_data_distint = $this->BasketModel->selectDistintbyCartid();
        $send = false;
        $aa = [];

        foreach($basket_data_distint as $distinitkey => $distint_val){

            if(date('n',$distint_val->date) == $_POST['month'] && date('Y',$distint_val->date) == $_POST['year']){

                    $basket_data_distint[$distinitkey]->product_name = 'โปรโมชั่น : ';
                    $basket_data_distint[$distinitkey]->product_name .= $this->PromotionModel->fetchPromotionlistByPromotionId($distint_val->promotion_id)[0]->promotion_name;
                    $basket_data_distint[$distinitkey]->price = $this->PromotionModel->fetchPromotionlistByPromotionId($distint_val->promotion_id)[0]->price;
                    $basket_data_distint[$distinitkey]->unit = $this->BasketModel->getpromotionunit($distint_val->cartID)[0]->unit;

                $send = true;
            }
        }

        if($send) echo json_encode($basket_data_distint);
        else echo json_encode($aa);

//        echo json_encode($basket_data_distint);

    }


} 