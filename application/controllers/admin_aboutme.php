<?php

class admin_aboutme extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model("AboutmeModel");

    }

    function index(){

        $data = array(
            'js' => array(
                base_url().'asset/js/admin_blog.js',
                base_url().'asset/js/admin_aboutme.js'
            )
        );
        $this->load->adminpage('aboutme',$data);

    }

    function submitContent(){

        $this->AboutmeModel->getData(array(
            'header' => $_POST['header'],
            'content' => $_POST['content'],
            'author' => $this->session->userdata('user_id'),
            'date' => time()
        ));

    }

} 