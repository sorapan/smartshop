<?php

class Index extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('BlogModel');
    }

    function index(){

        $this->load->layout1('home',array(

            'blogdata' => $this->BlogModel->selectLastBlogData()

        ));

    }

}
