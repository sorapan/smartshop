<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=titleMessage()?></title>
    <!--Primary Color:-->
    <!--086FA1	235D79	034769	3CA0D0	63ADD0-->
    <!--Complementary Color:-->
    <!--FF8900	BF7D30	A65900	FFA640	FFBE73-->
    <link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>asset/css/style.css">
    <?php
    if(isset($css))
        if(!is_array($css))
            echo '<link rel="stylesheet" href="'.$css.'">';
        else
            foreach($this->load->view($css) as $cssvalue)echo '<link rel="stylesheet" href="'.$cssvalue.'">';
    ?>
</head>
<body>

<header class="col-md-12">
    Smartshop 2
</header>

<nav id="menu" class="col-md-12">
    <ul class="nav nav-justified" id="menubar">
        <!--<li class="sidebar-brand" id="menubrand">Menu</li>-->
        <li><a href="<?=base_url()?>">หน้าแรก</a></li>
        <li><a href="<?=base_url()?>product">สินค้า</a></li>
        <li><a href="#">โปรโมชั่น</a></li>
        <li><a href="#">สินค้าเคลม</a></li>
        <li><a href="#">วิธีสั่งซื้อ</a></li>
        <li><a href="#">เกี่ยวกับเรา</a></li>
        <li><a href="#">ดาวน์โหลด</a></li>
    </ul>
</nav>

<nav id="sidebar" class="col-md-2">
    <ul class="nav row">
        <li class="sidebar-brand" id="menubrand">เข้าสู่ระบบ</li>
        <li>
            <div id="login_form">

                <div class="form-group">
                    <label for="userlogin">Username :</label>
                    <div class="col-md-12" style="padding: 0">
                        <input id="userlogin" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="passlogin">Password :</label>
                    <div class="col-md-12" style="padding: 0">
                        <input id="passlogin" type="password">
                    </div>
                </div>

                <br><input style="background-color:#086fa0;border:0;color:white" type="submit" value="Login" >
                <p style="font-size: 16px">ถ้ายังไม่สมัครสมาชิก <a style="color:red" href="<?=base_url()?>regisform">คลิก</a> ที่นี่</p>
            </div>
        </li>
    </ul>
    <ul id="menuside" class="nav row">
        <li class="sidebar-brand" id="menubrand">หมวดหมู่สินค้า</li>
        <li class="opt"><a href="#">สินค้า</a></li>
        <li class="opt"><a href="#">สินค้า</a></li>
        <li class="opt"><a href="#">สินค้า</a></li>
        <li class="opt"><a href="#">สินค้า</a></li>
    </ul>
</nav>

<div id="content" class="col-md-10 container" style="margin-bottom: 30px">
    <?php $this->load->view($include);?>
</div>

<footer class="col-md-12">
</footer>

<script src="<?=base_url()?>asset/js/jquery.js"></script>
<script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>asset/js/MenuControl.js"></script>
<?php
if(isset($js))
    if(!is_array($js))
        echo '<script src="'.$js.'"></script>';
    else
        foreach($this->load->view($js) as $jsvalue)echo '<script src="'.$jsvalue.'"></script>';
?>
</body>
</html>

<?php

function titleMessage($msg = "Smartshop | Welcome"){
    if(isset($msg))return $msg;
}

?>