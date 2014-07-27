<?php

class TypeModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function fetchMainType(){

        $this->db->select("*");
        $query = $this->db->get("type_product");
        return $query->result();

    }

    function insertMainType($dt){

        $data = array(
            'name' => $dt
        );
        $this->db->insert('type_product',$data);

    }



} 