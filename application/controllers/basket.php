<?php

class basket extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
        $this->load->model('BasketModel');
        $this->load->model('PromotionModel');
    }


    function index(){

        $user_session = $this->session->userdata('class');
        if($user_session != "user"){
            echo "แอดมินไม่สามารถซื้อสินค้าได้";
        }else{

            $itemChecked = $this->BasketModel->chkItemByproductId($_POST['productid']);
            $product = $this->ProductModel->fetchproductdataByproductId($_POST['productid']);
            $product_price = $product[0]->price;

            if(empty($itemChecked)){

                $data = array(
                    'product' => $_POST['productid'],
                    'product_name' => $product[0]->name,
                    'unit' => $_POST['want'],
                    'user' => $this->session->userdata('user_id'),
                    'price' => $_POST['want']*$product_price,
                    'date' => time()
                );
                $this->BasketModel->addTobasket($data);

            }else{

                $unit = $_POST['want']+$itemChecked[0]->unit;
                $price = ($_POST['want']*$product_price)+$itemChecked[0]->price;

                if($unit < $product[0]->unit){
                    $this->BasketModel->updateTobasket(
                        $_POST['productid'],
                        $this->session->userdata('user_id'),
                        $unit,
                        $price
                    );
                }else{

                    echo 'สินค้าเกิน';

                }

            }
        }

    }

    function basket_nonmember(){

        $this->session->set_userdata('non_member_bought',$_POST['non_member_bought']);
//        print_r($this->session->userdata('non_member_bought'));

    }

    function inbasket(){

        $inbasket = $this->BasketModel->fetchBasketDataByuserId($this->session->userdata('user_id'));
        $data  = array();

        foreach($inbasket as $k=>$inbasket_v){

            $product = $this->ProductModel->fetchproductdataByproductId($inbasket_v->product);
            $data[$k] = array(
                'name' => $product[0]->name,
                'id' => $product[0]->id,
                'unit' => $inbasket_v->unit,
            );

        }


        if(!empty($inbasket)){
            $data[0]['promotion_id'] = $inbasket[0]->promotion_id;
            $promotionlist_data = $this->PromotionModel->fetchPromotionlistByPromotionId($data[0]['promotion_id']);
        }

        if(isset($promotionlist_data[0]->promotion_name)){

            $data[0]['promotion_name'] = $promotionlist_data[0]->promotion_name;

        }

        if($this->session->userdata('buy_status') == 'wait'){
            $data[0]['non-close'] = true;
        }

        if(!empty($data))echo json_encode($data);
        else{
            $data[0] = "basket_empty";
            echo json_encode($data);
        }

    }

    function inbasket_nonmember(){

        if(!$this->session->userdata('login')){
            $data = array();
            $non_member_bought_data = $this->session->userdata('non_member_bought');
            foreach($non_member_bought_data as $key=>$val){

                $product = $this->ProductModel->fetchproductdataByproductId($val['productid']);
                $data[$key] = array(
                    'name' => $product[0]->name,
                    'id' => $product[0]->id,
                    'unit' => $val['want'],
                );

            }
            echo json_encode($data);
        }


    }

    function delete_item_in_basket(){

        $this->BasketModel->delBasketData($_POST['itemid'],$this->session->userdata('user_id'));

    }

    function delete_item_in_basket_nonmember(){

        $arr = $this->session->userdata('non_member_bought');

        foreach($arr as $k=>$v){

            if($v['productid'] == $_POST['itemid']){

                unset($arr[$k]);

            }

        }

        $arr = array_values($arr);
        $this->session->set_userdata('non_member_bought',$arr);

    }

    function check_non_member_bought(){

        if(!$this->session->userdata('login')){

//            $this->session->sess_destroy();
            echo json_encode($this->session->userdata('non_member_bought'));

        }

    }

    function product_detail(){

       echo json_encode($this->ProductModel->fetchproductdataByproductId($_POST['productid']));

    }

} 