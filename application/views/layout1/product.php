

<div class="col-xs-12 bigheader">สินค้า</div>

<div class="col-xs-12 card"  >

        <div class="col-xs-12 cardbrand">รายการ</div>
        <div class="col-xs-12 marginbot">
            <h4>ประเภทหลัก</h4>
            <div>
                <a class="tilemenu col-xs-3" href="<?=base_url()?>product">ทั้งหมด</a>
                <?php
                foreach($mt_data as $mt_val){
                ?>
                    <a class="tilemenu col-xs-3 producttype" href="<?=base_url()?>product/<?=$mt_val->id?>"><?=$mt_val->name?></a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-xs-12 marginbot">
            <h4 class="subtype_header"><?=isset($mt_name)?$mt_name!=='ทั้งหมด'?'ประเภทย่อยของ > '.$mt_name:'':''?></h4>
            <div class="subtype_menu" style="list-style-type: none;">

                <?php

                   if(isset($subtype_data))foreach($subtype_data as $val){
                ?>
                   <a class="tilemenu col-xs-3" href="<?=base_url()?>product/<?=$val->maintype?>/<?=$val->id?>"><?=$val->name?></a>
                <?php
                   }
                ?>

            </div>

        </div>
    </div>

<div class=" col-xs-12 margintop card">

    <div class="col-xs-12 cardbrand">ค้นหาตามชื่อสินค้า</div>

    <form action="<?=base_url()?>product/search" method="GET">
    <div class="col-xs-8 col-xs-offset-2 input-group">
        <input type="text" name="word" class="form-control search_product_textbox" value="<?=isset($_GET['word'])?$_GET['word']:''?>">
        <div class="input-group-btn">
            <button type="submit" class="search_product_btn btn bluebutton">ค้นหา</button>
        </div>
    </div>
    </form>

</div>

<?php
if(isset($mt_name)){
?>
<div class=" col-xs-12 margintop medheader">
<?php
    echo 'แสดง : '.$mt_name;
    if(isset($st_name))echo " > ".$st_name;
?>
</div>
<?php
}
?>

    <div class="col-xs-12 margintop">
<?php
//for($z=0;$z<10;$z++){
foreach($p_data as $p_val){
?>
        <div class="col-xs-4">
            <div class="thumbnail cardshadow">
                <div style="position: relative" class="limit_img">
                    <img src="<?=base_url()?>productImg/<?=$p_val->img?>">
                </div>
                <div style="display:none" class="productid"><?=$p_val->id?></div>
                <div style="display:none" class="userid"><?=$this->session->userdata('user_id')?></div>
                <div class="caption">
                    <h4  class="product_name text-overflow"><?=$p_val->name?></h4>
                    <p>ราคา : <span style="font-size:20px;color:red" class="product_price"><?=number_format($p_val->price)?></span> บาท</p>
<!--                    <p>จำนวน : <span class="product_unit">-->
<!--                    $p_val->unit -->
                    <!--</span> ชิ้น</p>-->

                        <div style="text-align: center" class="col-xs-12">
                            <a href="#" class="btn btn-sm whitebutton getdetail"  data-toggle="modal" data-target="#detailmodal" >ดูรายละเอียด</a>
                            <?php
                            if($this->session->userdata('class')!=='admin'){
                                if($this->session->userdata('buy_status') == 'none' ||
                                   $this->session->userdata('buy_status') == null){
                            ?>

                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn btn-sm bluebutton getitem" >หยิบใส่ตะกร้า</a>

                            <?php
                                }
                            }

                            ?>
                        </div>

                </div>
            </div>
        </div>
<?php
}

?>
    </div>


<nav class="col-xs-12">
    <ul class="pagination cardshadow">
        <?php

            $word = isset($_GET['word']) ? '&word='.$_GET['word'] : '';
            $getpage = isset($_GET['page']) ? $_GET['page'] : 1;
            $url_non_param = strtok($_SERVER["REQUEST_URI"],'?');
            if($getpage > 1){
        ?>
        <li><a href="<?=$url_non_param.'?page='.($getpage-1).$word?>">&laquo;</a></li>
        <?php
            }
            for($i=1;$i<=$dypage;$i++){
        ?>
        <li <?php
//            if(strtok($_SERVER["REQUEST_URI"],'?').'?page='.$i.$word==$_SERVER["REQUEST_URI"]){
            if($getpage == $i){
                echo'class="active"';
            }else if($getpage == 1)if($i==1)echo'class="active"';
            else echo'';
        ?>>
            <a href="<?=$url_non_param.'?page='.$i.$word?>"><?=$i?></a>
        </li>
        <?php
            }
            if($getpage<$dypage){
        ?>
        <li><a href="<?=$url_non_param.'?page='.($getpage+1).$word?>">&raquo;</a></li>
        <?php
            }
        ?>
    </ul>
</nav>



<!--////////////////////////////-->

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addtobasket_name"><?='ชื่อสินค้า'?></h4>
            </div>
            <div class="modal-body">


<!--                <div class="col-xs-12 marginbot">-->
<!--                    <div id="addtobasket_img" class="col-xs-10 col-xs-offset-1"></div>-->
<!--                </div>-->

                <form class="form-horizontal form-in-modal">
<!--                    <div class="form-group">-->
<!--                        <label class="col-xs-4 control-label">มีอยู่จำนวน</label>-->
<!--                        <div class="col-xs-8">-->
<!--                            <p class="form-control-static" id="addtobasket_unit"></p>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="form-group">
                        <label class="col-xs-4 control-label">ชื่อสินค้า</label>
                        <div class="col-xs-8">
                            <p class="form-control-static" id="addtobasket_name2"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-4 control-label">ราคา</label>
                        <div class="col-xs-8">
                            <p style="font-size:20px;color:red" class="form-control-static" id="addtobasket_price"></p>
                        </div>
                    </div>

<!--                    <div class="form-group">-->
<!--                        <label class="col-xs-4 control-label" for="add_unit" >จำนวนที่อยู่ในตะกร้า </label>-->
<!--                        <div class="col-xs-4">-->
<!--                            <p  class=" form-control-static" id="init_unit"></p>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="add_unit" >จำนวน </label>
                        <div class="col-xs-4">
                            <input maxlength="5" type="text" class=" form-control" id="add_unit">
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <hr>
                <button type="button" class="btn whitebutton" data-dismiss="modal">ปิด</button>
                <?php

                if($this->session->userdata('buy_status') != null){

                ?>

                <button type="button" id="addtobasket" class="btn bluebutton">ตกลง</button>

                <?php

                }else{

                ?>

                <button type="button" id="addtobasket_nonmember" class="btn bluebutton">ตกลง</button>

                <?php

                }

                ?>
            </div>

        </div>
    </div>
</div>

<!--////////////////////////////-->

<div class="modal" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="detail_name"><?='ชื่อสินค้า'?></h4>
            </div>
            <div class="modal-body">

                <div class="col-xs-12 marginbot">
                    <div id="detail_img" class="col-xs-10 col-xs-offset-1"></div>
                </div>

                <form class="form-horizontal form-in-modal">
                    <div class="form-group">
<!--                        <label class="col-xs-4 control-label">มีอยู่จำนวน</label>-->
                        <div class="col-xs-8">
                            <p class="form-control-static" id="detail_unit"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label">ราคา</label>
                        <div class="col-xs-8">
                            <p style="font-size:20px;color:red" class="form-control-static" id="detail_price"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label">รายละเอียด</label>
                        <div class="col-xs-10 col-xs-offset-1 margintop">
                            <p style="min-height: 150px;padding: 5px;word-break:break-all; background-color: #e0e0e0; line-height: 18px"  class="form-control-static" id="detail_detail"></p>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn whitebutton" data-dismiss="modal">ปิด</button>
            </div>

        </div>
    </div>
</div>
