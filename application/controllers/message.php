<?php

class message extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('MessageModel');
        $this->load->model('UsersModel');

    }

    function index(){

        $msg =  $this->MessageModel->userFetchData($this->session->userdata('user_id'));
        $data = array(
            'msg' => $msg,
            'mymsg' => $this->MessageModel->userFetchItsData($this->session->userdata('user_id')),
            'js' => array(
                base_url().'asset/js/message.js'
            )
        );
        $this->load->layout1('message',$data);

    }

    function sendmessage(){

        $this->MessageModel->insertData(array(

            'message' => $_POST['message'],
            'user_name' => $this->session->userdata('username'),
            'user_id' => $this->session->userdata('user_id'),
            'date' => time(),
            'class' => 'non-admin'

        ));

        $mailtos = 'newuser@localhost';
        $header  = 'MIME-Version: 1.0' . "\r\n";
        $header .= "Content-type: text/html; charset=utf-8" . "\r\n";
        $header .= "From: ระบบอีเมล Smartcom 2 <smartcom2@gmail.com>" . "\r\n";
        $subject = 'คุณ '.$this->session->userdata("username").' ได้สั่งข้อความถึงแอดมิน';
        $message = '

                <p>
                ตรวจสอบรายละเอียดที่
                <a href="http://localhost/peter/admin/message">http://localhost/peter/admin/message</a>
                </p>
                ';

        mail($mailtos, $subject, $message, $header);

    }

    function checkmessageunread(){

        $userdata = $this->UsersModel->fetchUSerDataByUsername($_POST['username'])[0];
        echo $this->MessageModel->fetchmessageUnreadByUserid($userdata->id);

    }

    function readedTrigger(){

        $userdata = $this->UsersModel->fetchUSerDataByUsername($_POST['username'])[0];
        $this->MessageModel->updateReaded($userdata->id);

    }

}