

<div class="col-md-12 bigheader">สินค้า</div>

<div class="col-md-12 cardshadow" id="productheader" >
        <div class="row">
        <div class="col-md-12"><h3>รายการ</h3></div>
        <div class="col-md-12 marginbot">
            <h4>ประเภทหลัก</h4>
            <div>
                <a class="tilemenu col-xs-3" href="<?=base_url()?>product">ทั้งหมด</a>
                <?php
                foreach($mt_data as $mt_val){
                ?>
                    <a class="tilemenu col-xs-3 producttype" typeid="<?=$mt_val->id?>"><?=$mt_val->name?></a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-12 marginbot">
            <h4 class="subtype_header"></h4>
            <div class="subtype_menu" style="list-style-type: none;">
            </div>
        </div>
        </div>
    </div>

<div class=" col-md-12 margintop medheader">
<?php
    echo 'แสดง : '.$mt_name;
    if(isset($st_name)){
        echo " > ".$st_name;
    }
?>
</div>

    <div class="col-md-12 margintop">
<?php
//for($z=0;$z<10;$z++){
foreach($p_data as $p_val){
?>
        <div class="col-md-4 col-xs-6">
            <div class="thumbnail cardshadow">
                <div style="position: relative" class="limit_img">
                    <img src="<?=base_url()?>productImg/<?=$p_val->img?>">
                </div>
                <div style="display:none" class="productid"><?=$p_val->id?></div>
                <div class="caption">
                    <h4  class="product_name"><?=$p_val->name?></h4>
                    <p>ราคา : <span class="product_price"><?=$p_val->price?></span> บาท</p>
                    <p>จำนวน : <span class="product_unit"><?=$p_val->unit?></span> ชิ้น</p>

                        <div style="text-align: center" class="col-md-12">
                            <a href="#" class="btn btn-sm whitebutton" >ดูรายละเอียด</a>
                            <?php if($this->session->userdata('class')!=='admin'){
                            ?>
                                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-sm bluebutton getitem" >หยิบใส่ตะกร้า</a>
                            <?php
                            }?>
                        </div>

                </div>
            </div>
        </div>
<?php
}
?>
</div>



<!--////////////////////////////-->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addtobasket_name"><?='ชื่อสินค้า'?></h4>
            </div>
            <div class="modal-body">


                <div class="col-md-12 marginbot">
                    <div id="addtobasket_img" class="col-md-10 col-md-offset-1"></div>
                </div>

                <form class="form-horizontal form-in-modal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">มีอยู่จำนวน</label>
                        <div class="col-md-8">
                            <p class="form-control-static" id="addtobasket_unit"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">ราคา</label>
                        <div class="col-md-8">
                            <p class="form-control-static" id="addtobasket_price"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="add_unit" >จำนวน </label>
                        <div class="col-md-4">
                            <input maxlength="5" type="text" class=" form-control" id="add_unit">
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn whitebutton" data-dismiss="modal">ปิด</button>
                <button type="button" id="addtobasket" data-dismiss="modal" class="btn bluebutton">ตกลง</button>
            </div>

        </div>
    </div>
</div>

