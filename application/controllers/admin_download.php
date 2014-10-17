<?php

class admin_download extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('DownloadModel');

    }

    function index(){

        $data['filedata'] = $this->DownloadModel->selectAllData();
        $data['js'] = array(
            base_url().'asset/js/admin_download.js'
        );
        $this->load->adminpage('download',$data);

    }

    function uploadfile(){

        echo '<meta charset="UTF8">';

        if(isset($_FILES['file'])){

            $this->DownloadModel->insertData(array(

                'file' => $_FILES["file"]['name'],
                'detail' => $_POST['detail'],
                'user' => $this->session->userdata('user_id'),
                'date' => time()

            ));

            if(move_uploaded_file($_FILES["file"]["tmp_name"],'file_download/'.$_FILES["file"]['name'])){
                echo 'อัพโหลดสำเร็จ';
            }else{
                echo 'อัพโหลดไม่สำเร็จ';
            }

        }else{

            echo 'ไม่มีไฟล์ที่อัพโหลด';

        }

        echo '<meta http-equiv="refresh" content="3;URL='.base_url().'admin/download'.'" >';
        echo '<br>กรุณารอสักครู่';


    }

    function deletefile(){

        $fileid = $_POST['fileid'];
        $filename = $_POST['filename'];
        unlink('file_download/'.$filename);
        $this->DownloadModel->deleteDataByID($fileid);

    }

} 