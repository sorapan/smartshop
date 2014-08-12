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

    function fetchproductdataByproductId($id){

        $this->db->select("*");
        $this->db->where("id",$id);
        return $this->db->get('product')->result();

    }

    function fetchproductBySubType($st,$mt){

        $this->db->select('*');
        $this->db->from('product');
        if($mt==null){
            //do nothing
        }else if($st==null){
            $this->db->join('type_product','product.maintype = type_product.id');
            $this->db->where('type_product.id',$mt);
        }else{
            $this->db->join('subtype_product','product.subtype = subtype_product.id');
            $this->db->where('subtype_product.id',$st);
        }
        return $this->db->get()->result();

    }
}