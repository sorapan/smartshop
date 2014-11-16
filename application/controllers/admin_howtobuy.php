<?php

class admin_howtobuy extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model("HowtobuyModel");

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $lastdata = $this->HowtobuyModel->selectLastBlogData();

        $data = array(
            'js' => array(
                base_url().'asset/js/admin_blog.js',
                base_url().'asset/js/admin_howtobuy.js'
            )
        );

        if(!empty($lastdata))$data['lastdata'] = $lastdata;

        $this->load->adminpage('howtobuy',$data);

    }

    function submitContent(){

        $lastdata = $this->HowtobuyModel->selectLastBlogData();

        if(empty($lastdata)){

            $this->HowtobuyModel->getData(array(
                'header' => $_POST['header'],
                'content' => $_POST['content'],
                'author' => $this->session->userdata('user_id'),
                'date' => time()
            ));

        }else{

            $this->HowtobuyModel->updateData(array(
                'header' => $_POST['header'],
                'content' => $_POST['content'],
                'author' => $this->session->userdata('user_id'),
                'date' => time()
            ),$lastdata[0]->id);

        }
    }

} 