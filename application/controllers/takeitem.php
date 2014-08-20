<?php

class takeitem  extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
        $this->load->model('BasketModel');
        $this->load->model('Bought_listModel');

    }

    function index(){

        $inbasket = $this->BasketModel->fetchdataJoinproductTable($this->session->userdata('user_id'));
        $allPrice = $this->BasketModel->allPrice($this->session->userdata('user_id'));

            $data = array(
                'basket_data' => $inbasket,
                'all_price' => $allPrice[0]->price,
                'js'=>array(
                    base_url().'asset/js/takeitem_.js'
                )
            );

        if($this->session->userdata('buy_status') == 'none'){

            $this->load->layout1('takeitem',$data);

        }else{

            $data['js'][1] = base_url().'asset/js/takeitem_takebasket.js';
            $this->load->layout1('takeitem_takebasket',$data);

        }

    }

    function itemlist(){

        $inbasket = $this->BasketModel->fetchdataJoinproductTable($this->session->userdata('user_id'));
        $allPrice = $this->BasketModel->allPrice($this->session->userdata('user_id'));
        $data = array(
            'basket_data' => $inbasket,
            'all_price' => $allPrice[0]->price,
        );
        echo json_encode($data);

    }

    function bought_it(){

        $type_address = $_POST['type_address'];
        $address = $_POST['address'];
        $price = $_POST['price'];
        $sendby = $_POST['sendby'];

        if($type_address == 'profile_address'){

            $address = $this->UsersModel->fetchUserData($this->session->userdata('user_id'))[0]->address;

        }

        $this->Bought_listModel->insertData(array(
            'price' => $price,
            'address' => $address,
            'sendby' => $sendby,
            'date' => time()
        ));

        $this->UsersModel->updateBuyStatusToWaiting($this->session->userdata('user_id'));

    }

}