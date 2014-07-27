<?php

class admin_type extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model("TypeModel");

    }

    function typeproduct(){

        $data = array(
            'js' => array(
                base_url().'asset/js/typeproduct.js'
            )
        );
        $this->load->emptylayout('typeproduct',$data);

    }

    function fetchmaintype(){

        $var = $this->TypeModel->fetchMainType();
        $arr = array();
        foreach($var as $val){

           $arr[$val->id] = $val->name;

        }
        echo json_encode($arr);

    }

    function insertmaintype(){

        $var = $this->TypeModel->fetchMainType();
        $ok = true;
        foreach($var as $val){
            if( $_POST['name'] == $val->name){
                $ok = false;
                break;
            }
        }
        if($ok)$this->TypeModel->insertMainType($_POST['name']);
        echo $ok;

    }

    function deletemaintype(){

        $this->TypeModel->deleteMainType($_POST['typename']);

    }

} 