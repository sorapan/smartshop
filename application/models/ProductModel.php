<?php

class ProductModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function productID(){

        $this->db->select_max("id");
        $this->db->from("product");
        return $this->db->get()->result();

    }

    function getproductdata($dt){

        $data = array(

            "productid" => $dt['productid'],
            "img" => $dt['img'],
            "name" => $dt['name'],
            "maintype" => $dt['maintype'],
            "subtype" => $dt['subtype'],
            "price" => $dt['price'],
            "unit" => $dt['unit'],
            "unitnot" => $dt['unitnot'],
            "detail" => $dt['detail'],
            "author" => $this->session->userdata('username'),
            "date" => $dt['date'],

        );
        $this->db->insert("product",$data);

    }

    function fetchproductdata(){

        $this->db->select("*");
        return $this->db->get('product')->result();

    }



}