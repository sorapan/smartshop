<?php

class howtobuy extends CI_Controller{

    function __construct(){

        parent::__construct();

    }

    function index(){

        $this->load->layout1('howtobuy');

    }
} 