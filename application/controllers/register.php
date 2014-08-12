<?php

class Register extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('UsersModel');

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
            foreach($loginresult as $logink=>$loginv){
                $this->session->set_userdata('login',true);
                $this->session->set_userdata('username',$loginv->username);
                $this->session->set_userdata('user_id',$loginv->id);
                $this->session->set_userdata('class',$loginv->class);
            }
            redirect("/");
        }else{
            $this->session->set_flashdata('loginmessage','** ล็อกอินผิดพลาด **');
            redirect("/");
        }
    }

    function destroysession(){

        $this->session->sess_destroy();
        redirect("/");

    }

} 