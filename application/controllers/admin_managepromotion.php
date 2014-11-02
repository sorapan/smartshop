<?php

class admin_managepromotion extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('PromotionModel');

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $data = array(
            'promotiondata' => $this->PromotionModel->fetchPromotionlist(),
            'js' => array(
                base_url().'asset/js/admin_managepromotion.js'
            )
        );
        $this->load->adminpage('managepromotion',$data);

    }

    function deletepromotion(){

        $this->PromotionModel->deletePromotionByID($_POST['promotionid']);

    }

} 