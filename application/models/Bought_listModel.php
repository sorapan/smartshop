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
        $this->db->where('verified','N');
        return $this->db->get('bought_list')->result();

    }

    function bought_verify($userid){

        $this->db->where('user',$userid);
        $this->db->update('bought_list',array(
           'verified' => 'Y'
        ));

    }


}