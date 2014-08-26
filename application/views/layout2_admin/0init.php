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
    <img style="margin-left:1%;width: 200px" src="<?=base_url()?>asset/img/ss.svg">
</header>

<div class="container-fluid" >

    <nav class="col-md-2">
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
                    <ul style="list-style-type: disc">
                        <li><p><a href="<?=base_url()?>">หน้าแรก</a></p></li>
                        <?php
                        if($this->session->userdata('class') == "admin"){
                            ?>
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

    <div id="content" class="col-md-8">
        <?php $this->load->view($include);?>
    </div>

    <div class="col-md-2 margintop">
        <div class="card">

            <div class="cardbrand">เมนูแอดมิน</div>
            <ul >
                <li><p><a class="AdminMenuButton" href="<?=base_url()?>admin/boughtlist">ยืนยันข้อมูลการซื้อ</a></p></li>
                <li><p><a class="AdminMenuButton" href="<?=base_url()?>admin/addproduct">เพิ่มข้อมูลสินค้า</a></p></li>
                <!--            <li><a class="AdminMenuButton" href="--><?//=base_url()?><!--">จัดการสมาชิก</a></li>-->
                <li><p><a class="AdminMenuButton" href="<?=base_url()?>admin/typeproduct">จัดการประเภทสินค้า</a></p></li>
                <!--            <li><a class="AdminMenuButton" href="#">ข้อความ</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">ประวัติการขาย</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">โปรโมชั่น</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">สินค้าเคลม</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">อัพโหลด</a></li>-->
                <!--            <li><a class="AdminMenuButton" href="#">เกี่ยวกับร้านค้า</a></li>-->
            </ul>

        </div>
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

