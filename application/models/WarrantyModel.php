<?php

class WarrantyModel extends CI_Model{

    function __construct(){

        parent::__construct();

    }

    function insertData($data){

        $this->db->insert('warranty',$data);

    }

    function selectAllData(){

        $this->db->select('*');
        return $this->db->get('warranty')->result();

    }

    function selectLastID(){

        $this->db->select_max('id');
        $this->db->from('warranty');
        return $this->db->get()->result();

    }

    function updateData($data,$cramecode){

        $this->db->where('crame_code', $cramecode);
        $this->db->update('warranty',$data);

    }

    function deleteData($cramecode){

        $this->db->where('crame_code', $cramecode);
        $this->db->delete('warranty');

    }

    function searchData($searchword,$searchby){

        $this->db->select('*');
        if($searchword !== "")$this->db->like($searchby,$searchword);
        return $this->db->get('warranty')->result();

    }


} 