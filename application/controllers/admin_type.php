<?php

class admin_type extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model("TypeModel");
        $this->load->model("ProductModel");

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function typeproduct(){

        $data = array(
            'js' => array(
                base_url().'asset/js/admin_type_.js'
            )
        );
        $this->load->adminpage('typeproduct',$data);

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
        if($_POST['name'] == "") $ok = false;
        if($ok)$this->TypeModel->insertMainType($_POST['name']);
        echo $ok;

    }

    function deletemaintype(){

        $maintype_id = $this->TypeModel->fetchMainTypeByMainNameType($_POST['typename'])[0]->id;
        $product = $this->ProductModel->fetchProductByMaintype($maintype_id);
        if($product != null){

            echo 'notnull';

        }else{

            $subtype = $this->TypeModel->fetchSubTypeByMainType($maintype_id);
            if($subtype != null){

                echo 'subnotnull';

            }else{

                echo 'null';
                $this->TypeModel->deleteMainType($_POST['typename']);

            }

        }

    }

    function insertsubtype(){

        $var = $this->TypeModel->fetchSubType();
        $ok = true;
        foreach($var as $val){
            if( $_POST['name'] == $val->name){
                $ok = false;
                break;
            }
        }
        if($_POST['name'] == "") $ok = false;
        if($_POST['maintypenum'] == "")$ok = false;
        if($ok)$this->TypeModel->insertSubType($_POST['name'],$_POST['maintypenum']);
        echo $ok;

    }

    function fetchsubtype(){ //By Maintype

        $arr = array();
        $maintype_arr = $this->TypeModel->fetchMainType();
        foreach($maintype_arr as $m_arr){
            $subtype = $this->TypeModel->fetchSubTypeByMainType($m_arr->id);
            foreach($subtype as $s_key => $s_arr){
                if($s_arr->name != null){
                    $arr[$m_arr->name][$s_key] = $s_arr->name;
                }
            }
        }
        echo json_encode($arr);

    }

    function deletesubtype(){

        $subtype_id = $this->TypeModel->fetchSubTypeBySubNameType($_POST['name'])[0]->id;
        $product = $this->ProductModel->fetchproductBySubTypeID($subtype_id);
        if($product != null){

            echo 'notnull';

        }else{

            echo 'null';
            $this->TypeModel->deleteSubType($_POST['name']);

        }

//        $this->TypeModel->deleteSubType($_POST['name']);

    }

} 