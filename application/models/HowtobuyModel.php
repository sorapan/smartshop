<?php

class HowtobuyModel extends CI_Model{

    function __construct(){

        parent::__construct();

    }

    function getData($data){

        $this->db->insert('howtobuy_blog',$data);

    }

    function updateData($data,$id){

        $this->db->where('id',$id);
        $this->db->update('howtobuy_blog',$data);

    }


    function selectAllBlogData(){

        $this->db->select('*');
        return $this->db->get('howtobuy_blog')->result();

    }

    function selectLastBlogData(){

        $this->db->select('*');
        $this->db->limit(1);
        $this->db->order_by('id','DESC');
        return $this->db->get('howtobuy_blog')->result();

    }

} 