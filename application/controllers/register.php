<?php

class Register extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('RegisterModel');

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

            print_r($datatransfer);

//            $this->RegisterModel->insertUser($datatransfer);
//            @header("location:".base_url());

        }else{
            @header("location:".base_url()."regisform");
        }
    }
} 