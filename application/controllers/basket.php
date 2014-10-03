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

        $user_session = $this->session->userdata('username');
        if($user_session !== "user"){
            echo "แอดมินไม่สามารถซื้อสินค้าได้";
        }else{

            $itemChecked = $this->BasketModel->chkItemByproductId($_POST['productid']);
            $product = $this->ProductModel->fetchproductdataByproductId($_POST['productid']);
            $product_price = $product[0]->price;

            if(empty($itemChecked)){

                $data = array(
                    'product' => $_POST['productid'],
                    'unit' => $_POST['want'],
                    'user' => $this->session->userdata('user_id'),
                    'price' => $_POST['want']*$product_price,
                    'date' => time()
                );
                $this->BasketModel->addTobasket($data);


            }else{

                $unit = $_POST['want']+$itemChecked[0]->unit;
                $price = ($_POST['want']*$product_price)+$itemChecked[0]->price;

                $this->BasketModel->updateTobasket(
                    $_POST['productid'],
                    $this->session->userdata('user_id'),
                    $unit,
                    $price
                );
            }
        }
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

        $data[0]['promotion_id'] = $inbasket[0]->promotion_id;
        $promotionlist_data = $this->PromotionModel->fetchPromotionlistByPromotionId($data[0]['promotion_id']);

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

    function delete_item_in_basket(){

        $this->BasketModel->delBasketData($_POST['itemid'],$this->session->userdata('user_id'));

    }

} 