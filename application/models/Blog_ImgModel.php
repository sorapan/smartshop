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

} 