<?php

class download extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('DownloadModel');

    }

    function index(){

        $data['filedata'] = $this->DownloadModel->selectAllData();
        $data['js'] = array(
            base_url().'asset/js/admin_download.js'
        );
        $this->load->layout1('download',$data);

    }

    function downloadfile($filename){

        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment; filename=".$filename);
        readfile("file_download/".$filename);

    }

} 