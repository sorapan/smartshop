<?php

class MY_Loader extends CI_Loader{

//    public function template1($template_name, $vars = array(), $return = FALSE){
//
//        $content  = $this->view('template1/header', $vars, $return);
//        $content .= $this->view($template_name, $vars, $return);
//        $content .= $this->view('template1/footer', $vars, $return);
//
//        if($return){
//
//            return $content;
//
//        }
//
//    }

    public function layout1($include, $vars = array(), $return = FALSE){

        $data = array(
            'include' => $include
        );
        foreach($vars as $varskey => $varsval){
            $data[$varskey] = $varsval;
        }
        $this->view('layout1/layout1',$data);
    }

}