<?php

class admin_aboutme extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model("AboutmeModel");
        $this->load->model("Blog_ImgModel");

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $lastdata = $this->AboutmeModel->selectLastBlogData();

        $data = array(
            'js' => array(
                base_url().'asset/js/admin_blog.js',
                base_url().'asset/js/admin_aboutme.js'
            )
        );

        if(!empty($lastdata))$data['lastdata'] = $lastdata;

        $this->load->adminpage('aboutme',$data);

    }

    function submitContent(){


        $lastdata = $this->AboutmeModel->selectLastBlogData();

        if(empty($lastdata)){

            $this->AboutmeModel->getData(array(
                'header' => $_POST['header'],
                'content' => $_POST['content'],
                'author' => $this->session->userdata('user_id'),
                'date' => time()
            ));

        }else{

            $this->AboutmeModel->updateData(array(
                'header' => $_POST['header'],
                'content' => $_POST['content'],
                'author' => $this->session->userdata('user_id'),
                'date' => time()
            ),$lastdata[0]->id);

        }

    }

    function bloguploadimg(){

        move_uploaded_file($_FILES['img']['tmp_name'],'blog_img/'.$_FILES['img']['name']);
        $this->Blog_ImgModel->insertData(array(

            'name' => $_FILES['img']['name'],
            'type' =>  $_FILES['img']['type'],
            'date' =>  time(),
            'user' => $this->session->userdata('user_id')

        ));

    }

    function fetchBlogImg(){

        echo json_encode($this->Blog_ImgModel->fetchAllData());

    }

    function deleteBlogImg(){

        $name = $this->Blog_ImgModel->fetchDataById($_POST['img_id'])[0]->name;
        unlink('blog_img/'.$name);
        $this->Blog_ImgModel->deleteDataById($_POST['img_id']);

    }

} 