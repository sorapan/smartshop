<?php

class Bought_listModel  extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function insertData($data){

        $this->db->insert('bought_list',$data);

    }

    function selectDataByUserID($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        return $this->db->get('bought_list')->result();

    }


}