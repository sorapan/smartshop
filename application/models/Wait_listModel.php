<?php

class Wait_listModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function insertWaitList($data){
        $this->db->insert('wait_list',$data);
    }

    function updateWaitList($data,$wait_list_id){
        $this->db->where('id',$wait_list_id);
        $this->db->update('wait_list',$data);
    }

    function fetchData(){
        $this->db->select("*");
        return $this->db->get("wait_list")->result();
    }

} 