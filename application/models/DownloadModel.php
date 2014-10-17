<?php

class DownloadModel extends CI_Model {

    function __construct(){

        parent::__construct();

    }

    function insertData($data){

        $this->db->insert('download',$data);

    }

    function selectAllData(){

        $this->db->select('*');
        return $this->db->get('download')->result();

    }

    function deleteDataByID($fileid){

        $this->db->where('id',$fileid);
        $this->db->delete('download');

    }

} 