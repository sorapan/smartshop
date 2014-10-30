<?php

class admin_productwarn extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('ProductModel');

    }

    function index(){

        $alldata = $this->ProductModel->fetchnotproductdata();

        $data= array(
            'alldata' => $alldata
        );

        $this->load->adminpage('productwarn',$data);

    }

}