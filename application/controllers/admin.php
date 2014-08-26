<?php


class admin extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model("ProductModel");

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
         }
    }

    function index(){

        $data = array(
            'css' => array(
                base_url().'asset/css/admin_style.css'
            )
        );
        $this->load->adminpage('admin',$data);

    }



} 