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
        $this->db->Order_by('id','DESC');
        return $this->db->get('bought_list')->result();

    }

    function selectDataByUserID($userid,$wait_list_id = null){

        $this->db->select('*');
        $this->db->where('user',$userid);
        if($wait_list_id != null)$this->db->where('wait_list_id',$wait_list_id);
        $this->db->where('verified','N');
//        $this->db->where('wait_list_id',null);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        return $this->db->get('bought_list')->result();

    }

    function selectDataByUserID2($userid,$date,$wait_list_id = null){

        $this->db->select('*');
        $this->db->where('user',$userid);
        $this->db->where('date',$date);
        if($wait_list_id != null)$this->db->where('wait_list_id',$wait_list_id);
//        $this->db->where('wait_list_id',null);
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

    function bought_verify($userid,$date){

        $this->db->where('user',$userid);
        $this->db->where('date',$date);
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

    function deleteByID($id){

        $this->db->where('id',$id);
        $this->db->delete('bought_list');

    }


}