<?php

class admin_message extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('MessageModel');

        if(!$this->session->userdata("login") or $this->session->userdata("class")!="admin"){
            redirect(base_url());
        }

    }

    function index(){

        $data = array(
            'data' => $this->MessageModel->adminFetchData(),
            'js' => array(
                base_url().'asset/js/admin_message.js'
            )
        );
        $this->load->adminpage('message',$data);

    }

    function fetchmessage(){

        echo json_encode($this->MessageModel->fetchmessagebyid($_POST['msg_id']));

    }

    function adminreply(){

        $replydata = $this->MessageModel->fetchmessagebyid($_POST['replyid'])[0];

        $msg = '<div class="msgreply"><div class="replyheader">ข้อความที่ตอบกลับ</div><div class="replymsg">';
        $msg .= $replydata->message.'</div>';
        $msg .= '<div class="content">'.$_POST['msg'].'</div></div>';

        $this->MessageModel->insertData(array(

            'message' => $msg,
            'user_name' => $this->session->userdata('username'),
            'user_id' => $this->session->userdata('user_id'),
            'date' => time(),
            'class' => 'admin',
            'to' => $_POST['to']

        ));

        $this->MessageModel->updateReply($_POST['user_id'],$_POST['date']);

    }

} 