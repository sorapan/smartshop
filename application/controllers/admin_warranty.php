<?php

class admin_warranty extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('WarrantyModel');

    }

    function index(){

        $this->load->adminpage('warranty',array(
            'js' => array(
                base_url().'asset/js/admin_warranty.js'
            ),
            'warrantydata' => $this->WarrantyModel->selectAllData()
        ));

    }

    function addwarrantylist(){

        $lastid = $this->WarrantyModel->selectLastID()[0]->id == null ? 1 : $this->WarrantyModel->selectLastID()[0]->id+1;
        $lastid = sprintf('%05d',$lastid);

        $this->WarrantyModel->insertData(array(
            'crame_code' => time().$lastid,
            'product_name' => $_POST['productname'],
            'detail' => $_POST['productdetail'],
            'date' => time()
        ));

    }

    function updateStatus(){

        $this->WarrantyModel->updateData(array(

            'status' => $_POST['new_status']

        ),$_POST['crame_code']);

    }

    function deleteList(){

        $this->WarrantyModel->deleteData($_POST['crame_code']);

    }

    function searchData(){

        $data = $this->WarrantyModel->searchData($_POST['search_word'],$_POST['search_by']);
        foreach($data as $key=>$val){
            $data[$key]->date = date('d/m/y',$val->date);
            switch($data[$key]->status){
                case 'waiting' :
                    $data[$key]->status = 'รอซ่อม...';
                    break;
                case 'inprogress' :
                    $data[$key]->status = 'กำลังซ่อม...';
                    break;
                case 'finished' :
                    $data[$key]->status = 'เสร็จแล้ว';
                    break;
            }
        }

        echo json_encode($data);

    }

} 