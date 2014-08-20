<?php


class UsersModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function insertUser($dt){

        $data = array(
          'username' => $dt['username'],
          'password' => $dt['password'],
          'realname' => $dt['realname'],
          'lastname' => $dt['lastname'],
          'email' => $dt['email'],
          'address' => $dt['address'],
          'tel' => $dt['tel'],
          'province' => $dt['province'],
          'zipcode' => $dt['zipcode'],
        );
        $this->db->insert('user', $data);

    }

    function fetchUserData($userid){

        $this->db->select('*');
        $this->db->where('id',$userid);
        return $this->db->get('user')->result();

    }

    function updateBuyStatusToWaiting($userid){

        $this->db->where('id', $userid);
        $this->db->update('user', array(
            'buy_status' => 'wait'
        ));

    }

    function loginUser($username,$password){

        $this->db->select('username,password,class,id,buy_status');
        $this->db->where('username',$username)->where('password',$password);
        $query = $this->db->get('user');
        return $query->result();

    }

} 