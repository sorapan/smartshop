<?php
/**
 * Created by PhpStorm.
 * User: Sorapan
 * Date: 7/22/14
 * Time: 3:01 PM
 */

class admin extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    function index(){

        $data = array(
          'css' => array(
              base_url().'layout1/css/adminstyle.css'
          )
        );

        $this->load->layout1('admin',$data);
    }
} 