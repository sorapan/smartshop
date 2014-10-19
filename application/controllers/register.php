<?php

class Register extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->model('BasketModel');
        $this->load->model('ProductModel');

    }

    function index(){

        $this->load->layout1('regisform');

    }

    function regis(){

        if(
            $_POST['username'] != "" &&
            $_POST['password'] != "" &&
            $_POST['realname'] != "" &&
            $_POST['lastname'] != "" &&
            $_POST['address'] != "" &&
            $_POST['email'] != "" &&
            $_POST['province'] != "" &&
            $_POST['zipcode'] != "" &&
            $_POST['tel'] != ""
        ){
            $datatransfer = array(
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'realname' => $_POST['realname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'tel' => $_POST['tel'],
                'province' => $_POST['province'],
                'zipcode' => $_POST['zipcode'],
            );
            $this->UsersModel->insertUser($datatransfer);
            redirect("/");

        }else{
            redirect("regisform");
        }
    }

    function login(){

        $loginresult = $this->UsersModel->loginUser($_POST['userlogin'],$_POST['passlogin']);
        if(!empty($loginresult)){

            $non_member_bought = $this->session->userdata('non_member_bought');

            foreach($non_member_bought as $val){

                $itemChecked = $this->BasketModel->chkItemByproductId($val['productid']);
                $product = $this->ProductModel->fetchproductdataByproductId($val['productid']);
                $product_price = $product[0]->price;

                if(empty($itemChecked)){

                    $data = array(
                        'product' => $val['productid'],
                        'unit' => $val['want'],
                        'user' => $loginresult[0]->id,
                        'price' => $val['want']*$product_price,
                        'date' => time()
                    );
                    $this->BasketModel->addTobasket($data);

                }else{

                    $unit = $val['want']+$itemChecked[0]->unit;
                    $price = ($val['want']*$product_price)+$itemChecked[0]->price;

                    $this->BasketModel->updateTobasket(
                        $val['productid'],
                        $loginresult[0]->id,
                        $unit,
                        $price
                    );
                }
            }

            foreach($loginresult as $logink=>$loginv){
                $this->session->set_userdata('login',true);
                $this->session->set_userdata('username',$loginv->username);
                $this->session->set_userdata('user_id',$loginv->id);
                $this->session->set_userdata('buy_status',$loginv->buy_status);
                $this->session->set_userdata('class',$loginv->class);
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('loginmessage','** ล็อกอินผิดพลาด **');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    function destroysession(){

        $this->session->sess_destroy();
        redirect("/");

    }

    function signin(){

        if(!$this->session->userdata('login')){

            $this->load->layout1('signin');

        }else{

            redirect('/');

        }

    }

} 