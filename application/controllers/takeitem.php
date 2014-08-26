<?php

class takeitem  extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
        $this->load->model('BasketModel');
        $this->load->model('Bought_listModel');
        $this->load->model('Wait_listModel');

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

        }else if($this->session->userdata('buy_status') == 'wait'){

            $data['js'][1] = base_url().'asset/js/takeitem_takebasket.js';
            $this->load->layout1('takeitem_takebasket',$data);

        }else{

            $this->load->layout1('takeitem',$data);

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
        $this->session->set_userdata('buy_status','wait');

    }

    function to_waiting_list(){

        $data = array(
            'money' => $_POST['money'],
            'date' => strtotime($_POST['day']." ".$_POST['mon']." ".$_POST['year']-543),
            'time' => $_POST['time'],
            'user' => $this->session->userdata('user_id')
        );

        $this->Wait_listModel->insertWaitList($data);


        if(isset($_FILES['bill_file'])){

            $temp = explode(".", $_FILES["bill_file"]["name"]);
            $extension = end($temp);

            $basket = $this->Wait_listModel->fetchData()[0]->id;

            $img_name = $basket.".".$extension;
            move_uploaded_file($_FILES['bill_file']['tmp_name'],"../peter/bill_img/".$img_name);
            $this->Wait_listModel->updateWaitList(array(
                'bill_dir' => $basket.".".$extension
            ),$basket);

        }

        $this->UsersModel->updateBuyStatusToNone($this->session->userdata('user_id'));
        $this->session->set_userdata('buy_status','none');
        $basket_data = $this->BasketModel->fetchBasketDataByuserId($this->session->userdata('user_id'));
        foreach($basket_data as $basket_val){

            $productmodel = $this->ProductModel->fetchproductdataByproductId($basket_val->product);
            $productunit = $productmodel[0]->unit;
            $productid = $basket_val->product;
            $this->ProductModel->updateProductData($productid,$productunit-$basket_val->unit);

        }
        $this->BasketModel->clearBasketDataByUserid($this->session->userdata('user_id'));

        redirect(base_url());

    }

}