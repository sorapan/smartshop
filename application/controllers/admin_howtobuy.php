<?php

class admin_howtobuy extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model("HowtobuyModel");

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $data = array(
            'js' => array(
                base_url().'asset/js/admin_blog.js',
                base_url().'asset/js/admin_howtobuy.js'
            )
        );
        $this->load->adminpage('howtobuy',$data);

    }

    function submitContent(){

        $this->HowtobuyModel->getData(array(
            'header' => $_POST['header'],
            'content' => $_POST['content'],
            'author' => $this->session->userdata('user_id'),
            'date' => time()
        ));

    }

} 