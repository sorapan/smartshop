<?php

class TypeModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function fetchMainType(){

        $this->db->select("*");
        $query = $this->db->get("type_product");
        return $query->result();

    }

    function insertMainType($dt){

        $data = array(
            'name' => $dt
        );
        $this->db->insert('type_product',$data);

    }

    function deleteMainType($typename){

        $this->db->delete('type_product',array('name'=>$typename));

    }

    function fetchSubType(){

        $this->db->select("*");
        $query = $this->db->get("subtype_product");
        return $query->result();

    }

    function fetchSubTypeByMainType($maintype_id){

        $this->db->select("*");
        $this->db->where('maintype',$maintype_id);
        $query = $this->db->get('subtype_product');
        return $query->result();

    }

    function insertSubType($name,$maintype_num){

        $data = array(
            'name' => $name,
            'maintype' => $maintype_num
        );
        $this->db->insert('subtype_product',$data);

    }

    function deleteSubType($name){

        $this->db->delete("subtype_product",array('name'=>$name));

    }

    function ChkmaintypeFromsubtype($subtypeid){

        $this->db->select('type_product.id');
        $this->db->from('type_product');
        $this->db->join('subtype_product','type_product.id = subtype_product.maintype');
        $this->db->where('subtype_product.id',$subtypeid);
        $query = $this->db->get();
        return $query->result();

    }

    function MainTypeFromId($maintypeid){

        $this->db->select('name');
        $this->db->where('id',$maintypeid);
        return $this->db->get('type_product')->result()[0];

    }

    function SubTypeFromId($subtypeid){

        $this->db->select('name');
        $this->db->where('id',$subtypeid);
        return $this->db->get('subtype_product')->result()[0];

    }

} 