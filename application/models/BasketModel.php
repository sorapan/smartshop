<?php

class BasketModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function addTobasket($data){

        $this->db->insert('basket',$data);

    }

    function fetchBasketDataByuserId($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        return $this->db->get('basket')->result();

    }

} 