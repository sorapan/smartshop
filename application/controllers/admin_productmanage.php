<?php

class admin_productmanage extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
        $this->load->model('BasketModel');

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index($main=null,$sub=null){

        $mt = $this->TypeModel->fetchMainType();
        $productdata = $this->ProductModel->fetchproductBySubTypeAllSell($sub,$main);

        $data = array(
            'p_data'=>$productdata,
            'mt_data'=>$mt,
            'js' => array(
                base_url().'asset/js/admin_productmanage.js',
                base_url().'asset/js/admin_product_uploadimg.js',
                base_url().'asset/js/admin_product_.js'
            )
        );

        foreach($productdata as $key => $val){

            if($val->img == null){
                $data['p_data'][2]->img = "http://www.parentcenterhub.org/wp-content/uploads/2014/03/No-Image-.jpg";
            }
        }

        if($main==null){
            $data['mt_name']="ทั้งหมด";
        }else if($sub==null){
            $maintypename = $this->TypeModel->MainTypeFromId($main);
            $subtypedata = $this->TypeModel->fetchSubTypeByMainType($main);

            $data['mt_name']=$maintypename->name;
            $data['subtype_data']=$subtypedata;
        }else{
            $maintypename = $this->TypeModel->MainTypeFromId($main);
            $subtypename = $this->TypeModel->SubTypeFromId($sub);
            $subtypedata = $this->TypeModel->fetchSubTypeByMainType($main);
            $data['mt_name']=$maintypename->name;
            $data['st_name']=$subtypename->name;
            $data['subtype_data']=$subtypedata;
        }

        $this->load->adminpage('productmanage',$data);

    }

    function fetchproductdata(){

        $productid = $_POST['productid'];
        echo json_encode($this->ProductModel->fetchproductdataByproductId($productid));

    }

    function updateproduct(){

        $imgdir = "productImg/";
        $imgdirtemp =  "productImg_temp/";

        $file = $this->session->userdata('imguploadfile');
        $typefile = strchr($file,".");

        $newfilename = $file != null ? sprintf("%010d", $_POST['productid']).$typefile : null;
        @copy($imgdirtemp.$file, $imgdir.$newfilename);
        @unlink($imgdirtemp.$file);

        $maintype = $this->TypeModel->ChkmaintypeFromsubtype($_POST['subtype'])[0]->id;

        $this->ProductModel->updateProductData($_POST['productid'],array(
            'maintype' =>  $maintype,
            'subtype' =>  $_POST['subtype'],
            'price' =>  $_POST['price'],
            'unit' =>  $_POST['unit'],
            'unitnot' =>  $_POST['unitnot'],
            'detail' =>  $_POST['detail'],
            'date' => time()
        ));

        if($newfilename != null){
            $this->ProductModel->updateProductData($_POST['productid'],array(
                'img' => $newfilename
            ));
        }

        $this->session->set_userdata('imguploadfile',null);

    }

    function deleteImgInStore(){

        $this->ProductModel->delProductImg($_POST['productid']);
        $aa = explode("/",$_POST['img_url']);
        $imgdir = "productImg/";
        @unlink($imgdir.end($aa));

    }

    function buyingtoggle(){

        $this->ProductModel->togglebuying($_POST['productid']);

    }

    function deleteproduct(){

        $inbasket = $this->BasketModel->chkProductByProductid($_POST['productid']);
        if($inbasket == null){

            $this->ProductModel->deleteProduct($_POST['productid']);
            $aa = explode("/",$_POST['img_url']);
            $imgdir = "productImg/";
            @unlink($imgdir.end($aa));

        }else{
            echo 'not';
        }

    }

    private function productID(){

        $productid = $this->ProductModel->productID();
        return sprintf("%010d", $productid[0]->id);

    }

} 