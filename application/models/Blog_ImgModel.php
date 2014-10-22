<?php

class Blog_ImgModel extends CI_Model{

    function __construct(){

        parent::__construct();

    }

    function insertData($data){

        $this->db->insert('blog_img',$data);

    }

    function fetchAllData(){

        $this->db->select('*');
        return $this->db->get('blog_img')->result();

    }


    function fetchDataById($id){

        $this->db->select('*');
        $this->db->where('id',$id);
        return $this->db->get('blog_img')->result();

    }

    function deleteDataById($id){

        $this->db->where('id',$id);
        $this->db->delete('blog_img');

    }

} 