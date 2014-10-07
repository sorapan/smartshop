<?php

class Index extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model('BlogModel');

    }

}
