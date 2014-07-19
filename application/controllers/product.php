<?php
/**
 * Created by PhpStorm.
 * User: Sorapan
 * Date: 7/19/14
 * Time: 3:40 PM
 */

class product extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    function index(){

        $this->load->template1('product');

    }

} 