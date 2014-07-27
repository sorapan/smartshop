<?php

class admin_product extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model("ProductModel");

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function addproduct(){

        $data = array(
            'css' => array(
                base_url().'asset/css/uploadproduct_style.css'
            ),
            'js' => array(
                base_url().'asset/js/uploadimg.js'
            )
        );
        $this->load->adminpage('addproduct',$data);
    }

    private $imgdir = "productImg/";
    private $imgdirtemp =  "productImg_temp/";

    function uploadProuctImg(){

        $this->session->set_userdata('imguploadfile',$_FILES['img']['name']);
        if($_FILES["img"]["error"] == UPLOAD_ERR_OK){
            move_uploaded_file( $_FILES["img"]["tmp_name"], $this->imgdirtemp.$_FILES['img']['name']);
        }
        echo $this->imgdirtemp.$_FILES['img']['name'];

    }

    function addproductsubmit(){

        if(
            $_POST['name']&&
            $_POST['type']&&
            $_POST['price']&&
            $_POST['unit']&&
            $_POST['unitnot']&&
            $_POST['detail']
        ){

            $file = $this->session->userdata('imguploadfile');
            $typefile = strchr($file,".");

            $newfilename = $this->productID().$typefile;
            @copy($this->imgdirtemp.$file, $this->imgdir.$newfilename);
            @unlink($this->imgdirtemp.$file);

            $uptodb = array(

                'productid' => $this->productID(),
                'img' => $newfilename,
                'name' =>  $_POST['name'],
                'type' =>  $_POST['type'],
                'price' =>  $_POST['price'],
                'unit' =>  $_POST['unit'],
                'unitnot' =>  $_POST['unitnot'],
                'detail' =>  $_POST['detail'],
                'date' => time()

            );
            $this->ProductModel->getproductdata($uptodb);
        }
        redirect(base_url()."admin");
    }

    private function productID(){

        $productid = $this->ProductModel->productID();
        return sprintf("%010d", $productid[0]->id+1);

    }

}