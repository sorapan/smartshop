<?php

class aboutme extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('AboutmeModel');

    }

    function index(){

        $this->load->layout1('aboutme',array(
            'blogdata' => $this->AboutmeModel->selectLastBlogData()
        ));

    }
} 