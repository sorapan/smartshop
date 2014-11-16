<?php

class admin_blog extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model("BlogModel");

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $lastdata = $this->BlogModel->selectLastBlogData();

        $data = array(
            'js' => array(
                base_url().'asset/js/admin_blog.js'
            )
        );

        if(!empty($lastdata))$data['lastdata'] = $lastdata;

        $this->load->adminpage('addblog',$data);

    }

    function submitContent(){

        $lastdata = $this->BlogModel->selectLastBlogData();

        if(empty($lastdata)){

            $this->BlogModel->getData(array(
                'header' => $_POST['header'],
                'content' => $_POST['content'],
                'author' => $this->session->userdata('user_id'),
                'date' => time()
            ));

        }else{

            $this->BlogModel->updateData(array(
                'header' => $_POST['header'],
                'content' => $_POST['content'],
                'author' => $this->session->userdata('user_id'),
                'date' => time()
            ),$lastdata[0]->id);

        }

    }

} 