<?php

class Bought_listModel  extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function insertData($data){

        $this->db->insert('bought_list',$data);

    }


}