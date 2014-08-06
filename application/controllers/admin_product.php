<?php

class admin_product extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model("ProductModel");
        $this->load->model("TypeModel");

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
                base_url().'asset/js/uploadimg.js',
                base_url().'asset/js/addproduct.js'
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
        echo "../productImg_temp/".$_FILES['img']['name'];

    }

    function addproductsubmit(){

        if(
            $_POST['name']&&
            $_POST['subtype']&&
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

            $maintype = $this->TypeModel->ChkmaintypeFromsubtype($_POST['subtype'])[0]->id;

            $uptodb = array(

                'productid' => $this->productID(),
                'img' => $newfilename,
                'name' =>  $_POST['name'],
                'maintype' =>  $maintype,
                'subtype' =>  $_POST['subtype'],
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

    function fetchproductType(){

        $arr = array();
        $maintype_arr = $this->TypeModel->fetchMainType();
        foreach($maintype_arr as $m_arr){
            $subtype = $this->TypeModel->fetchSubTypeByMainType($m_arr->id);
            foreach($subtype as $s_key => $s_arr){
                if($s_arr->name != null){
                    $arr[$m_arr->name][$s_key][0] = $s_arr->id;
                    $arr[$m_arr->name][$s_key][1] = $s_arr->name;
                }
            }
        }
        echo json_encode($arr);

    }

    function deleteTempImg(){

        unlink($_POST['tempimg']);

    }

    private function productID(){

        $productid = $this->ProductModel->productID();
        return sprintf("%010d", $productid[0]->id+1);

    }

}