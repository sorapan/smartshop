<?php

class admin_member extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model("ProductModel");
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

        $data['userdata'] = $this->UsersModel->fetchAllUserData();
        $data['js'] = array(
            base_url()."asset/js/admin_member.js"
        );
        $this->load->adminpage('member',$data);

    }

    function memeberdetail(){

        echo json_encode($this->UsersModel->fetchUserData($_POST['userid']));

    }

    function editmember(){

        $this->UsersModel->updateUserData($_POST['id'],array(

            'password' => $_POST['password'],
            'class' => $_POST['class'],
            'email' => $_POST['email'],
            'realname' => $_POST['realname'],
            'lastname' => $_POST['lastname'],
            'tel' => $_POST['tel'],
            'address' => $_POST['address'],
            'province' => $_POST['province'],
            'zipcode' => $_POST['zipcode']

        ));

    }

    function deletemember(){

        $this->UsersModel->deleteUserByUSerID($_POST['userid']);

    }


} 