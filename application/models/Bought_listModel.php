<?php

class Bought_listModel  extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function insertData($data){

        $this->db->insert('bought_list',$data);

    }

    function selectAllData(){

        $this->db->select('*');
        $this->db->Order_by('date','ASC');
        return $this->db->get('bought_list')->result();

    }

    function selectDataByUserID($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        $this->db->where('verified','N');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        return $this->db->get('bought_list')->result();

    }

    function selectLastDataByUserID($userid){

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

    function updateWaitlistID($userid,$WaitlistID){

        $this->db->where('user',$userid);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $this->db->update('bought_list',array(
            'wait_list_id' => $WaitlistID
        ));

    }


}