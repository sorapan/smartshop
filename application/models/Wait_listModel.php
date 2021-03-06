<?php

class Wait_listModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function insertWaitList($data){
        $this->db->insert('wait_list',$data);
    }

    function deleteBycartid($cartid){
        $this->db->delete('wait_list',array(
            'cartID' => $cartid
        ));
    }

    function updateWaitList($data,$wait_list_id){
        $this->db->where('id',$wait_list_id);
        $this->db->update('wait_list',$data);
    }

    function fetchData(){
        $this->db->select("*");
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        return $this->db->get("wait_list")->result();
    }

    function selectAllDataByUserID($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        return $this->db->get('wait_list')->result();

    }

    function selectDataByUserID($userid){

        $this->db->select('*');
        $this->db->where('user',$userid);
        $this->db->where('verified','N');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
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


    function bought_verify($userid,$cartid){

        $this->db->where('user',$userid);
        $this->db->where('cartID',$cartid);
        $this->db->update('wait_list',array(
            'verified' => 'Y'
        ));

    }

    function updateCartID($userid,$cartID){

        $this->db->where('user',$userid);
        $this->db->order_by('id','DESC');
        $this->db->where('cartID',null);
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

    function selectAllDataJoinBoughtlistByUserid($userid){

        $this->db->select('wait_list.date, wait_list.cartID, wait_list.time, bought_list.user, bought_list.sendby, bought_list.price, wait_list.money, wait_list.bill_dir');
        $this->db->from('wait_list');
        $this->db->join('bought_list','bought_list.id = wait_list.bought_list_id');
        $this->db->where('bought_list.user',$userid);
        $this->db->where('bought_list.verified','N');
        $this->db->order_by('wait_list.id','DESC');
        return $this->db->get()->result();

    }

    function selectAllDataJoinBoughtlistByUseridVerified($userid){

        $this->db->select('wait_list.date, wait_list.cartID, wait_list.time, bought_list.user, bought_list.sendby, bought_list.price, wait_list.money, wait_list.bill_dir');
        $this->db->from('wait_list');
        $this->db->join('bought_list','bought_list.id = wait_list.bought_list_id');
        $this->db->where('bought_list.user',$userid);
        $this->db->where('bought_list.verified','Y');
        $this->db->order_by('wait_list.id','DESC');
        return $this->db->get()->result();

    }

    function selectByWaitlistID($waitlistid){

        $this->db->select('*');
        $this->db->from('wait_list');
        $this->db->where('id',$waitlistid);
        return $this->db->get()->result();

    }

} 