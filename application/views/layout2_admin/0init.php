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
<body>

<div style="background-color: #e7e7e7;margin: 0;padding: 0">

<header class="col-xs-12 min1300">
    <img style="margin-left:1%;width: 200px" src="<?=base_url()?>asset/img/ss.svg">
    <span class="right" style="font-size: 0.8em"> : ADMIN</span>
</header>

<div class="container" style="padding-bottom: 140px">

    <nav class="col-xs-2">
        <ul class="nav card margintop">
            <?php
            /////////////////////// login false
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

                            <br><input style="background-color:#086fa0;border:0;color:white" type="submit" value="Login" >
                        </form>
                        <br>
                        <p style="font-size: 16px;color:red"><?=$this->session->flashdata('loginmessage')?></p>
                        <p>ถ้ายังไม่สมัครสมาชิก <a style="color:red" href="<?=base_url()?>regisform">คลิก</a></p>
                    </div>
                </li>
                <?php
                /////////////////////// login true
            }else{
                ?>

                <li class="cardbrand">คุณ <?=$this->session->userdata('username')?></li>
                <li>
                    <p>ระดับ : <?=$this->session->userdata('class')?></p>
                    <ul class="nav navnav">
                        <li><a href="<?=base_url()?>">หน้าแรก</a></li>
                        <?php
                        if($this->session->userdata('class') == "admin"){
                            ?>
                            <li><a href="<?=base_url()?>admin">หน้าแอดมิน</a></li>
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

    </nav>

    <div id="content" class="col-xs-8">
        <?php $this->load->view($include);?>
    </div>

    <div class="col-xs-2 margintop">
        <div class="card">

            <div class="cardbrand">เมนูแอดมิน</div>
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
    </div>

</div>


<footer class="col-xs-12 min1300">
</footer>

</div>

<script src="<?=base_url()?>asset/js/jquery.js"></script>
<script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>asset/js/index_publicMethod.js"></script>
<script src="<?=base_url()?>asset/js/admin_index_menucontrol.js"></script>
<?php
if(isset($js)){
    if(!is_array($js))echo '<script src="'.$js.'"></script>';
    else foreach($js as $jsvalue)echo '<script src="'.$jsvalue.'"></script>';
}
?>
</body>
</html>

