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

    function selectDataByUserID($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        $this->db->where('verified','N');
        return $this->db->get('wait_list')->result();

    }

    function selectAllData(){

        $this->db->select('*');
        $this->db->where('verified','N');
        return $this->db->get('wait_list')->result();

    }

    function selectAllDataVerified(){

        $this->db->select('*');
        $this->db->where('verified','Y');
        return $this->db->get('wait_list')->result();

    }


    function bought_verify($userid){

        $this->db->where('user',$userid);
        $this->db->update('wait_list',array(
            'verified' => 'Y'
        ));

    }

    function updateCartID($userid,$cartID){

        $this->db->where('user',$userid);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $this->db->update('wait_list',array(
            'cartID' => $cartID
        ));

    }

    function updateBoughtlistID($userid,$boughtlistID){

        $this->db->where('user',$userid);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $this->db->update('wait_list',array(
            'bought_list_id' => $boughtlistID
        ));

    }

} 