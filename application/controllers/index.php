<?php

class Index extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('BlogModel');
        $this->load->model('ProductModel');
    }

    function index(){

        $productdata = $this->ProductModel->fetchproductBySubType2(null,null);

        $this->load->layout1('home',array(

            'blogdata' => $this->BlogModel->selectLastBlogData(),
            'p_data'=>$productdata,

        ));

    }

}
