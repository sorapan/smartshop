<?php

class AboutmeModel extends CI_Model{

    function __construct(){

        parent::__construct();

    }

    function getData($data){

        $this->db->insert('aboutme_blog',$data);

    }

    function selectAllBlogData(){

        $this->db->select('*');
        return $this->db->get('aboutme_blog')->result();

    }

    function selectLastBlogData(){

        $this->db->select('*');
        $this->db->limit(1);
        $this->db->order_by('id','DESC');
        return $this->db->get('aboutme_blog')->result();

    }

} 