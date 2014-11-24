<?php

class MessageModel extends CI_Model{

    function __construct(){

        parent::__construct();

    }

    function insertData($data){

        $this->db->insert('message',$data);

    }

    function adminFetchData(){

        $this->db->select('*')->where('class','non-admin')->Order_by('date','DESC');
        return $this->db->get('message')->result();

    }

    function userFetchData($user_id){

        $this->db->select('*')->where('class','admin')->where('to',$user_id)->Order_by('date','DESC');
        return $this->db->get('message')->result();

    }

    function fetchmessagebyid($id){

        $this->db->select('*')->where('id',$id);
        return $this->db->get('message')->result();

    }

} 