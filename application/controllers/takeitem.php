<?php

class takeitem  extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->model('ProductModel');
        $this->load->model('TypeModel');
        $this->load->model('BasketModel');
        $this->load->model('Bought_listModel');
        $this->load->model('Wait_listModel');
        $this->load->model('PromotionModel');

    }

    function index(){

        $inbasket = $this->BasketModel->fetchdataJoinproductTable($this->session->userdata('user_id'));

//        if(@$inbasket[0]->promotion_id == ""){
//
//            $allPrice = $this->BasketModel->allPrice($this->session->userdata('user_id'));
//            $allPrice = $allPrice[0]->price;
//
//        }else{
//
//            $promotionlist_data = $this->PromotionModel->fetchPromotionlistByPromotionId($inbasket[0]->promotion_id);
//            $allPrice = $promotionlist_data[0]->price;
//
//        }


        foreach($inbasket as $key=>$val){

            if($val->promotion_id != null){

                $promotion = $this->PromotionModel->fetchPromotionlistByPromotionId($val->promotion_id);
                $inbasket[$key]->name = 'โปรโมชั่น:'.$promotion[0]->promotion_name;
                $inbasket[$key]->price = $promotion[0]->price;
                $inbasket[$key]->unit = '1';

            }

        }

        $allPrice = 0;
        foreach($inbasket as $val)$allPrice += $val->price;

            $data = array(
                'basket_data' => $inbasket,
                'all_price' => $allPrice,
                'js'=>array(
                    base_url().'asset/js/takeitem_.js'
                )
            );

        if($this->session->userdata('buy_status') == 'none'){

            $this->load->layout1('takeitem',$data);

        }else if($this->session->userdata('buy_status') == 'wait'){

//            $data['all_price'] = $this->Bought_listModel->selectDataByUserID($this->session->userdata('user_id'))[0]->price;
            $data['all_price'] = $this->Bought_listModel->selectDataByUserID($this->session->userdata('user_id'))[0]->price;
            $data['sendby'] = $this->Bought_listModel->selectDataByUserID($this->session->userdata('user_id'))[0]->sendby;
            $data['boughtid'] = $this->Bought_listModel->selectDataByUserID($this->session->userdata('user_id'))[0]->id;
            $data['js'][1] = base_url().'asset/js/takeitem_takebasket.js';
            $this->load->layout1('takeitem_takebasket',$data);

        }else{

            $this->load->layout1('takeitem',$data);

        }

    }

    function itemlist(){

        $inbasket = $this->BasketModel->fetchdataJoinproductTable($this->session->userdata('user_id'));
        $allPrice = $this->BasketModel->allPrice($this->session->userdata('user_id'));
        $data = array(
            'basket_data' => $inbasket,
            'all_price' => $allPrice[0]->price,
        );
        echo json_encode($data);

    }

    function bought_it(){

//        echo 'fuck';

        $type_address = $_POST['type_address'];

        $address = $_POST['address'];
        $price = $_POST['price'];
        $sendby = $_POST['sendby'];
        $user_realname = $_POST['user_realname'];
        $tel = $_POST['tel'];
        $province = $_POST['province'];
        $zipcode =  $_POST['zipcode'];

        if($type_address == 'profile_address'){

            $userdata = $this->UsersModel->fetchUserData($this->session->userdata('user_id'));
            $user_realname = $userdata[0]->realname."  ".$userdata[0]->lastname;
            $tel = $userdata[0]->tel;
            $province = $userdata[0]->province;
            $zipcode = $userdata[0]->zipcode;
            $address = $userdata[0]->address;

        }

        // minus product unit
        $basket_data = $this->BasketModel->fetchBasketDataByuserId2($this->session->userdata('user_id'));
        foreach($basket_data as $basket_val){

            $productmodel = $this->ProductModel->fetchproductdataByproductId($basket_val->product);
            $productunit = $productmodel[0]->unit;
            $productid = $basket_val->product;
            $this->ProductModel->updateProductData2($productid, $productunit-$basket_val->unit );

        }

        $this->Bought_listModel->insertData(array(
            'price' => $price,
            'user_realname' => $user_realname,
            'province' => $province,
            'zipcode' => $zipcode,
            'tel' => $tel,
            'address' => $address,
            'sendby' => $sendby,
            'date' => time(),
            'user' => $this->session->userdata('user_id')
        ));

        $this->UsersModel->updateBuyStatusToWaiting($this->session->userdata('user_id'));
        $this->session->set_userdata('buy_status','wait');

        $this->sendEmail('takeitem');

    }

    function to_waiting_list(){

        if(empty($_POST['money']) && empty($_POST['time']) ){

            $this->session->set_flashdata('towaitinglistwarn','** กรอกข้อมูลไม่สมบูรณ์ **');
            redirect(base_url().'takeitem');

        }else{

            $this->Wait_listModel->insertWaitList(array(
                'money' => $_POST['money'],
                'date' => strtotime($_POST['day']." ".$_POST['mon']." ".$_POST['year']-543),
                'time' => $_POST['time'],
                'user' => $this->session->userdata('user_id')
            ));

            if(!empty($_FILES['bill_file']['size'])){

                $temp = explode(".", $_FILES["bill_file"]["name"]);
                $extension = end($temp);

                $basket = $this->Wait_listModel->fetchData()[0]->id;

                $img_name = $basket.".".$extension;
                move_uploaded_file($_FILES['bill_file']['tmp_name'],"bill_img/".$img_name);
                $this->Wait_listModel->updateWaitList(array(
                    'bill_dir' => $basket.".".$extension
                ),$basket);

            }

            $this->UsersModel->updateBuyStatusToNone($this->session->userdata('user_id'));
            $this->session->set_userdata('buy_status','none');

            $this->BasketModel->updateBoughtDataToY($this->session->userdata('user_id'));

            $this->Wait_listModel->updateCartID(
                $this->session->userdata('user_id'),
                $this->Bought_listModel->selectDataByUserID($this->session->userdata('user_id'))[0]->date
            );

            $this->BasketModel->updateCartID(
                $this->session->userdata('user_id'),
                $this->Bought_listModel->selectDataByUserID($this->session->userdata('user_id'))[0]->date
            );

            $this->Wait_listModel->updateBoughtlistID(
                $this->session->userdata('user_id'),
                $this->Bought_listModel->selectDataByUserID($this->session->userdata('user_id'))[0]->id
            );

            $this->Bought_listModel->updateWaitlistID(
                $this->session->userdata('user_id'),
                $this->Wait_listModel->selectDataByUserID($this->session->userdata('user_id'))[0]->id
            );

            $this->sendEmail('boughtit');
            redirect(base_url());

        }

    }

    function takeitem_nonmember(){

        if(!$this->session->userdata('login')){
            if($this->session->userdata('non_member_bought') == true){

                $dt = array();
                $non_member_bought_data = $this->session->userdata('non_member_bought');
                foreach($non_member_bought_data as $key=>$val){

                    if($val['promotionid'] == null){

                        $product = $this->ProductModel->fetchproductdataByproductId($val['productid']);
                        $dt[$key] = array(
                            'name' => $product[0]->name,
                            'id' => $product[0]->id,
                            'want' => $val['want'],
                            'price' => $product[0]->price,
                            'promotion' => false
                        );

                    }else{

                        $promotion_data = $this->PromotionModel->fetchPromotionlistByPromotionId($val['promotionid']);
                        $dt[$key] = array(
                            'name' => 'โปรโมชั่น : '.$promotion_data[0]->promotion_name,
                            'id' => $promotion_data[0]->id,
                            'want' => $val['want'],
                            'price' => $promotion_data[0]->price,
                            'promotion' => true
                        );

                    }

                }

                $data['boughtdata'] = $dt;

                foreach($dt as $v){

                    @$data['all_price'] += $v['price']*$v['want'];

                }

                $this->load->layout1('takeitem_nonmember',$data);

            }else{

                $this->load->layout1('takeitem_nonmember');

            }

        }

    }

    function bought_cancel(){

        $boughtlist_id = $_POST['boughtlist_id'];
        $user_id = $this->session->userdata('user_id');
        $this->Bought_listModel->deleteByID($boughtlist_id);
        foreach($this->BasketModel->fetchBasketDataByuserId($user_id) as $val){

            $productmodel = $this->ProductModel->fetchproductdataByproductId($val->product);
            $this->ProductModel->updateProductData($val->product,array(
                'unit' => $productmodel[0]->unit+$val->unit
            ));

        }
        $this->BasketModel->delBasketNoDataByUserid($user_id);
        $this->UsersModel->updateBuyStatusToNone($user_id);

        $this->sendEmail('boughtcancel');
        $this->session->set_userdata('buy_status','none');

    }

    function bought_back(){

        $boughtlist_id = $_POST['boughtlist_id'];
        $user_id = $this->session->userdata('user_id');
        $this->Bought_listModel->deleteByID($boughtlist_id);
        $this->UsersModel->updateBuyStatusToNone($user_id);

        $this->sendEmail('boughtcancel');
        $this->session->set_userdata('buy_status','none');

    }

    private function sendEmail($status){

        $mailtos = 'newuser@localhost';
        $header  = 'MIME-Version: 1.0' . "\r\n";
        $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
        $header .= "From: ระบบอีเมล Smartcom 2 <smartcom2@gmail.com>" . "\r\n";

        switch($status){

            case 'takeitem':
                $subject = 'คุณ '.$this->session->userdata("username").' ได้สั่งซื้อสินค้าแล้ว';
                $message = '
                <p>
                ตรวจสอบรายละเอียดที่
                <a href="http://localhost/peter/admin/boughtchecker">'.base_url().'admin/boughtchecker</a>
                </p>
                ';
                break;

            case 'boughtit':
                $subject = 'คุณ '.$this->session->userdata("username").' ได้โอนเงินแล้ว';
                $message = '
                <p>
                ตรวจสอบรายละเอียดที่
                <a href="http://localhost/peter/admin/boughtchecker">'.base_url().'admin/boughtchecker</a>
                </p>
                ';
                break;

            case 'boughtcancel':
                $subject = 'คุณ '.$this->session->userdata("username").' ได้ยกเลิกการซื้อสินค้าแล้ว';
                $message = '
                <p>
                ตรวจสอบรายละเอียดที่
                <a href="http://localhost/peter/admin/boughtchecker">'.base_url().'admin/boughtchecker</a>
                </p>
                ';
                break;

            case 'boughtback':
                $subject = 'คุณ '.$this->session->userdata("username").' ได้ยกเลิกเพื่อแก้ไขการซื้อสินค้า';
                $message = '
                <p>
                ตรวจสอบรายละเอียดที่
                <a href="http://localhost/peter/admin/boughtchecker">'.base_url().'admin/boughtchecker</a>
                </p>
                ';
                break;

        }

        mail($mailtos, $subject, $message, $header);

    }


}