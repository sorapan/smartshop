<?php

class admin_message extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('MessageModel');

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $data = array(
            'data' => $this->MessageModel->adminFetchData(),
            'js' => array(
                base_url().'asset/js/admin_message.js'
            )
        );
        $this->load->adminpage('message',$data);

    }

    function fetchmessage(){

        echo json_encode($this->MessageModel->fetchmessagebyid($_POST['msg_id']));

    }

    function adminreply(){

        $this->MessageModel->insertData(array(

            'message' => $_POST['msg'],
            'user_name' => $this->session->userdata('username'),
            'user_id' => $this->session->userdata('user_id'),
            'date' => time(),
            'class' => 'admin',
            'to' => $_POST['to']

        ));

    }

} 