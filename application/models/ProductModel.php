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

    function fetchnotproductdata(){

        $this->db->select("*");
        $this->db->where("unit <= unitnot");
        return $this->db->get('product')->result();

    }

    function fetchproductdataByproductId($id){

        $this->db->select("*");
        $this->db->where("id",$id);
        return $this->db->get('product')->result();

    }

    function fetchProductByMaintype($maintype){

        $this->db->select('*');
        $this->db->where('maintype',$maintype);
        return $this->db->get('product')->result();

    }

    function fetchproductBySubTypeID($subtypeid){

        $this->db->select('*');
        $this->db->where('subtype',$subtypeid);
        return $this->db->get('product')->result();

    }

    function fetchproductBySubTypeAllSell($st,$mt){

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

    private $limitpage = 2;

    function fetchproductBySubType($st,$mt,$offset,$all=false){

        $this->db->select('product.name,product.price,product.id,product.img,product.unit');
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
        $this->db->where('product.sell',true);
        $this->db->offset($offset*$this->limitpage);
        if($all==false)$this->db->limit($this->limitpage);
        $this->db->order_by('product.id','DESC');
        return $this->db->get()->result();

    }

    function fetchproductBySubType2($st,$mt){

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
        $this->db->limit(6);
        $this->db->where('product.sell',true);
        $this->db->order_by('product.id','DESC');
        return $this->db->get()->result();

    }

    function fetchproductByWord($word,$offset){

        $this->db->select('*');
        $this->db->from('type_product');
        $this->db->join('product','product.maintype = type_product.id');
        if($word !== "")$this->db->like('product.name',$word);
        $this->db->offset($offset*$this->limitpage);
        $this->db->limit($this->limitpage);
        return $this->db->get()->result();

    }

    function fetchproductByWord2($word,$offset=null){

        $this->db->select('*');
        $this->db->from('type_product');
        $this->db->join('product','product.maintype = type_product.id');
        if($word !== "")$this->db->like('product.name',$word);
        if($offset!=null)$this->db->offset($offset*$this->limitpage);
        if($offset!=null)$this->db->limit($this->limitpage);
        return $this->db->get()->result();

    }

    function updateProductData($productid,$unit){

        $this->db->where('id',$productid);
        $this->db->update('product',$unit);

    }

    function updateProductData2($productid,$unit){

        $this->db->where('id',$productid);
        $this->db->update('product',array(
            'unit' => $unit
        ));

    }

    function delProductImg($productid){

        $this->db->where('id',$productid);
        $this->db->update('product',array(
            'img' => 'pro'
        ));

    }

    function getbuying($productid){

        $this->db->select('*');
        $this->db->where('id',$productid);
        return $this->db->get('product')->result()[0]->sell;

    }

    function togglebuying($productid){

        $sell = $this->getbuying($productid);
        $this->db->where('id',$productid);
        $update = $sell == 'true' ? 'false' : 'true';
        $this->db->update('product',array(
            'sell' => $update
        ));

    }

    function deleteProduct($productid){

        $this->db->delete('product',array(
            'id' => $productid
        ));

    }

    function DYpage($mt = null,$st = null,$word = null){

        if($mt!=null)$this->db->where('maintype',$mt);
        if($st!=null)$this->db->where('subtype',$st);
        if($word!=null)$this->db->like('name',$word);
        $this->db->from('product');
        return $this->db->count_all_results()/$this->limitpage;
    }

}