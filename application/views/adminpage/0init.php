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
    <link rel="stylesheet" href="<?=base_url()?>asset/css/admin_style.css">
    <?php
    if(isset($css)){
        if(!is_array($css))echo '<link rel="stylesheet" href="'.$css.'">';
        else foreach($css as $cssvalue)echo '<link rel="stylesheet" href="'.$cssvalue.'">';
    }
    ?>
</head>
<body>

<header class="col-md-12">
    Smartshop 2
</header>


<nav id="sidebar" class="col-md-2">

    <ul class="nav">

        <?php
        /////////////////////// login true
        if(!$this->session->userdata('login')){
            ?>

            <li class="sidebar-brand" id="menubrand">เข้าสู่ระบบ</li>

            <li>
                <div id="login_form">
                    <form method="POST" action="<?=base_url()?>login">
                        <div class="form-group">
                            <label for="userlogin">Username :</label>
                            <div class="col-md-12" style="padding: 0">
                                <input id="userlogin" name="userlogin" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="passlogin">Password :</label>
                            <div class="col-md-12" style="padding: 0">
                                <input id="passlogin" name="passlogin" type="password">
                            </div>
                        </div>

                        <br><input style="background-color:#086fa0;border:0;color:white" type="submit" value="Login" >
                    </form>
                    <br>
                    <p style="font-size: 22px;color:red"><?=$this->session->flashdata('loginmessage')?></p>
                    <p style="font-size: 16px">ถ้ายังไม่สมัครสมาชิก <a style="color:red" href="<?=base_url()?>regisform">คลิก</a> ที่นี่</p>
                </div>
            </li>
<?php
/////////////////////// login false
        }else{
            ?>

            <li class="sidebar-brand" id="menubrand">ยินดีต้อนรับ</li>
            <li style="padding: 10px 0 0 10px;">
                <p>ยินดีต้อนรับ ,<b><?=$this->session->userdata('username')?></b></p>
                <p>ระดับ ,<b><?=$this->session->userdata('class')?></b></p>
                <ul style="list-style-type: disc">
                <?php
                if($this->session->userdata('class') == "admin"){
                    ?>
                    <li><p><a href="<?=base_url()?>">หน้าแรก</a></p></li>
                    <li><p><a href="<?=base_url()?>admin">หน้าแอดมิน</a></p></li>
                <?php
                }
                ?>
                <li><p><a href="<?=base_url()?>destroy">ออกจากระบบ</a></p></li>
                </ul>
            </li>

        <?php
        }
        ?>
    </ul>
</nav>

<div id="content" class="col-md-10 container" style="margin-bottom: 30px">
        <div id="adminPageLoad" class="col-md-9" style="min-height: 600px">
            <?php $this->load->view($include);?>
        </div>
        <div class="col-md-3 sidebar-module">
            <h4>เมนูแอดมิน</h4>
            <ul id="adminmenu"  class="nav navbar">
                <li><a class="AdminMenuButton" href="<?=base_url()?>admin/addproduct">เพิ่มข้อมูลสินค้า</a></li>
                <!--            <li><a class="AdminMenuButton" href="--><?//=base_url()?><!--">จัดการสมาชิก</a></li>-->
                <li><a class="AdminMenuButton" href="<?=base_url()?>admin/typeproduct">จัดการประเภทสินค้า</a></li>
                <!--            <li><a class="AdminMenuButton" href="#">ข้อความ</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">ประวัติการขาย</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">โปรโมชั่น</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">สินค้าเคลม</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">อัพโหลด</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">เกี่ยวกับร้านค้า</a></li>-->
            </ul>
        </div>
</div>



<footer class="col-md-12">
</footer>

<script src="<?=base_url()?>asset/js/jquery.js"></script>
<script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>asset/js/MenuControl.js"></script>
<?php
if(isset($js)){
    if(!is_array($js))echo '<script src="'.$js.'"></script>';
    else foreach($js as $jsvalue)echo '<script src="'.$jsvalue.'"></script>';
}
?>
</body>
</html>

