
<?php

function titleMessage($title = "Smartshop | Welcome"){
    return $title;
}

function css($css = null){
    if(isset($css)){
        if(!is_array($css))return '<link rel="stylesheet" href="'.$css.'">';
        else{
            $ec = "";
            foreach($css as $cssvalue)$ec .= '<link rel="stylesheet" href="'.$cssvalue.'">';
            return $ec;
        }
    }else return null;
}

function js($js){
    if(isset($js))
        if(!is_array($js))return '<script src="'.$js.'"></script>';
        else{
            $ec = "";
            foreach($js as $jsvalue)$ec .= '<script src="'.$jsvalue.'"></script>';
            return $ec;
        }
    else return null;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <link rel="icon" type="image/svg+xml" href="<?=base_url()?>asset/img/ss_new_fav.svg">
    <title><?=titleMessage()?></title>
    <!--Primary Color:-->
    <!--086FA1	235D79	034769	3CA0D0	63ADD0-->
    <!--Complementary Color:-->
    <!--FF8900	BF7D30	A65900	FFA640	FFBE73-->
    <link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap-theme.css">
    <link rel="stylesheet" href="<?=base_url()?>asset/css/Layout1.css">

    <?php
    if(isset($css)){
        if(!is_array($css))echo '<link rel="stylesheet" href="'.$css.'">';
        else foreach($css as $cssvalue)echo '<link rel="stylesheet" href="'.$cssvalue.'">';
    }
    ?>
</head>
<body  data-spy="scroll" data-target="#basketbox">

<div style="background-color: #e7e7e7">

    <header class="col-xs-12 min1300">
        <img style="margin-left:1%;width: 200px" src="<?=base_url()?>asset/img/ss.svg">
    </header>


    <div id="menu" class="col-xs-12 min1300">
        <div class="row">
            <div id="menubar">
                <a href="<?=base_url()?>">หน้าแรก</a>
                <a href="<?=base_url()?>product">สินค้า</a>
                <a href="<?=base_url()?>promotion">โปรโมชั่น</a>
                <a href="<?=base_url()?>warranty">สินค้าเคลม</a>
                <a href="<?=base_url()?>howtobuy">วิธีสั่งซื้อ</a>
                <a href="<?=base_url()?>aboutme">เกี่ยวกับเรา</a>
                <a href="<?=base_url()?>download">ดาวน์โหลด</a>
            </div>
        </div>
    </div>


    <div class="container" style="padding-bottom: 140px">

        <nav class="col-xs-2">

            <ul class="nav card margintop">
                <?php
                /////////////////////// login == false
                if(!$this->session->userdata('login')){
                    ?>

                    <li class="cardbrand">เข้าสู่ระบบ</li>

                    <li>
                        <div id="login_form">
                            <form method="POST" action="<?=base_url()?>login">

                                <div class="form-group">
                                    <label for="userlogin">Username :</label>
                                    <input id="userlogin" class="form-control"  name="userlogin" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="passlogin">Password :</label>
                                    <input id="passlogin" class="form-control"  name="passlogin" type="password">
                                </div>

                                <br><button class="btn bluebutton" type="submit" >เข้าสู่ระบบ</button>
                            </form>
                            <br>
                            <p class="text-danger"><?=$this->session->flashdata('loginmessage')?></p>
                            <p>ถ้ายังไม่สมัครสมาชิก <a href="<?=base_url()?>regisform">คลิก</a></p>
                        </div>
                    </li>
                    <?php
                    /////////////////////// login == true
                }else{
                    ?>

                    <li class="cardbrand">คุณ <?=$this->session->userdata('username')?></li>
                    <li>
                        <p>ระดับ : <?=$this->session->userdata('class')?></p>
                        <ul class="nav navnav">
                            <?php
                            if($this->session->userdata('class') == "admin"){
                                ?>
                                <li><a href="<?=base_url()?>admin">หน้าแอดมิน</a></li>
                            <?php
                            }
                            if($this->session->userdata('class') == "user"){
                                ?>
                                <li><a href="<?=base_url()?>boughtlist">ติดตามรายการสั่งซื้อ</a></li>
                                <li><a href="<?=base_url()?>message">ส่งข้อความให้แอดมิน</a></li>
                            <?php
                            }
                            ?>
                            <li><a href="<?=base_url()?>destroy">ออกจากระบบ</a></li>
                        </ul>
                    </li>

                <?php
                }
                ?>
            </ul>

            <ul id="typemenu" class="nav navnav card margintop">
                <li class="cardbrand">รายการสินค้า</li>
                <li><a href="<?=base_url()?>product">ทั้งหมด</a></li>
            </ul>

        </nav>


        <div id="content" class="col-xs-8">
            <?php $this->load->view($include);?>
        </div>


        <div id="basketbox" class=" col-xs-2" >
            <div style="width: 200px;background-color: white " class="cardshadow margintop nav" data-spy="affix" data-offset-top="125">

                <?php

                if($this->session->userdata('class') !== 'admin'){

                    ?>

                    <div class="col-xs-12"><h4>ตะกร้าสินค้า</h4></div>
                    <div class="col-xs-12" style="background-color: #bbbbbb;height: 200px;overflow-y: scroll">
                        <div class="row" id="in_basket">
                            <!--                <div class="col-xs-12 basket_list">aaaa</div>-->
                        </div>
                    </div>
                    <div class="col-xs-12" style="background-color: white;height: auto;line-height: 50px;text-align: center">

                        <?php
                        if($this->session->userdata('buy_status') == 'none' || $this->session->userdata('buy_status') == null ){
                            if($this->session->userdata('login')){
                                ?>
                                <a href="<?=base_url()?>takeitem" class="btn bluebutton">ดูรายการสั่งซื้อ</a>

                            <?php
                            }else{
                                ?>

                                <a href="<?=base_url()?>takeitem/takeitem_nonmember" class="btn bluebutton">ดูรายการสั่งซื้อ</a>

                            <?php
                            }
                        }else{
                            ?>
                            <a href="<?=base_url()?>takeitem" class="btn yellowbutton">ยืนยันการโอนเงิน</a>
                        <?php
                        }
                        ?>
                    </div>


                <?php
                }else{
                    ?>

                    <div class="col-xs-12 card">
                        <div class="cardbrand"><a href="<?=base_url()?>admin">หน้าแอดมิน</a></div>
                        <ul class="nav navnav">
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/productwarn">สินค้าที่ใกล้หมด</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/boughtchecker">ตรวจสอบการซื้อสินค้า</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/boughtlist">ยืนยันข้อมูลการซื้อ</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/member">จัดการสมาชิก</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/addproduct">เพิ่มข้อมูลสินค้า</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/typeproduct">จัดการประเภทสินค้า</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/productmanage">จัดการรายการสินค้า</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/message">ข้อความ</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/promotion">โปรโมชั่น</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/managepromotion">จัดการโปรโมชั่น</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/blog">เพิ่มข้อความหน้าเว็บ</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/howtobuy">เพิ่มวิธีการสั่งซื้อ</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/aboutme">เพิ่มเกี่ยวกับร้านค้า</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/warranty">เคลมสินค้า</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/download">อัพโหลด</a></li>
                            <li><a class="AdminMenuButton" href="<?=base_url()?>admin/profit">สรุปยอดขาย</a></li>
                        </ul>
                    </div>
                    <div>

                    </div>

                <?php
                }
                ?>

            </div>
        </div>

    </div>


    <footer class="col-xs-12">
        sss
    </footer>

</div>

<script src="<?=base_url()?>asset/js/jquery.js"></script>
<script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>asset/js/index_publicMethod.js"></script>
<script src="<?=base_url()?>asset/js/index_MenuControl.js"></script>
<script src="<?=base_url()?>asset/js/index_productMenu.js"></script>
<script src="<?=base_url()?>asset/js/index_basket.js"></script>
<?php
if(isset($js)){

    if(!is_array($js))echo '<script src="'.$js.'"></script>';
    else foreach($js as $jsvalue)echo '<script src="'.$jsvalue.'"></script>';
}
?>

</body>
</html>

