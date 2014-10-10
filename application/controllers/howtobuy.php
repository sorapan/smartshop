<?php

class howtobuy extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('HowtobuyModel');

    }

    function index(){

        $this->load->layout1('howtobuy',array(
            'blogdata' => $this->HowtobuyModel->selectLastBlogData()
        ));

    }
} 