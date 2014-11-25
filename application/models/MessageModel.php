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

        $this->db->select('*')->where('class','admin')->where('to',$user_id)->Order_by('date','DESC')->limit(15);
        return $this->db->get('message')->result();

    }

    function fetchmessagebyid($id){

        $this->db->select('*')->where('id',$id);
        return $this->db->get('message')->result();

    }

    function fetchmessageUnreadByUserid($userid){

        $this->db->from('message');
        $this->db->where('to',$userid);
        $this->db->where('read','unread');
        return $this->db->count_all_results();

    }

    function updateReaded($userid){

        $this->db->where('to',$userid);
        $this->db->update('message',array(
            'read' => 'readed'
        ));

    }

    function updateReply($userid,$date){
        $this->db->where('to',$userid);
        $this->db->where('date',$date);
        $this->db->update('message',array(
            'reply' => 'Y'
        ));
    }

} 