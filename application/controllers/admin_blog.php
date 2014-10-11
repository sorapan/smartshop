<?php

class admin_blog extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model("BlogModel");

    }

    function index(){

        $data = array(
            'js' => array(
                base_url().'asset/js/admin_blog.js'
            )
        );
        $this->load->adminpage('addblog',$data);

    }

    function submitContent(){

        $this->BlogModel->getData(array(
            'header' => $_POST['header'],
            'content' => $_POST['content'],
            'author' => $this->session->userdata('user_id'),
            'date' => time()
        ));

    }

} 