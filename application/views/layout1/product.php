

<div class="col-md-12 bigheader">สินค้า</div>

<div class="col-md-12 cardshadow" id="productheader" >
        <div class="row">
        <div class="col-md-12"><h3>รายการ</h3></div>
        <div class="col-md-3 ">
            <h4>ประเภทหลัก</h4>
            <ul style="list-style-type: none;">
                <?php
                foreach($mt_data as $mt_val){
                    echo "<li>".$mt_val->name."<li>";
                }
                ?>
            </ul>
        </div>
        <div class="col-md-2">
            <h4>ประเภทหลัก</h4>
            <ul style="list-style-type: none;">
                <li>sdfdsfsd</li>
                <li>dslifkjdnf</li>
            </ul>
        </div>
        </div>
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
                            <a href="#" class="btn btn-sm whitebutton" >ดูรายระเอียด</a>
                            <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-sm bluebutton getitem" >หยิบใส่ตะกร้า</a>
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

                <div class="col-md-12">

                    <div class="col-md-12">
                        <div id="addtobasket_img" class="col-md-10 col-md-offset-1 "></div>
                    </div>

                    <div class="col-md-12" style="margin: 20px">
                        <p>มีอยู่จำนวน <span id="addtobasket_unit"></span> ชิ้น</p>
                        <p>ราคา <span id="addtobasket_price"></span> บาท</p>
                    </div>
                </div>

                <div class="form-horizontal col-md-offset-3">
                    <div class="form-group">
                        <label for="buy_unit" class="col-md-2 control-label">จำนวน </label>
                        <div class="col-md-5">
                            <input maxlength="5" type="text" class=" form-control" id="add_unit">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="button" id="addtobasket" data-dismiss="modal" class="btn btn-primary">ตกลง</button>
            </div>

        </div>
    </div>
</div>

