<?php

class Index extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    function index(){


        $data = array('aa'=>'peter');
        $this->load->layout1('home',$data);

    }

}
