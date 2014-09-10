<div class="bigheader">จัดการรายการสินค้า</div>

<?php
//if(isset($mt_name)){
//    ?>
<!--    <div class=" col-xs-12 medheader">-->
<!--        --><?php
//        echo 'แสดง : '.$mt_name;
//        if(isset($st_name))echo " > ".$st_name;
//        ?>
<!--    </div>-->
<?php
//}
//?>

<div class="col-xs-12">
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

                    <div style="text-align: right" class="col-md-12">
                        <a href="#" data-toggle="modal" data-target="#myModal"  class="btn btn-sm bluebutton edit_btn" >แก้ไข</a>
                        <a href="#" class="btn btn-sm yellowbutton" >ลบ</a>
                    </div>

                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>



<!--////////////////////////////-->


<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addtobasket_name"><?='ชื่อสินค้า'?></h4>
            </div>
            <div class="modal-body">

                <div id="showimg">
<!--                    <div class="col-md-6 col-md-push-3" id="uploadimgbox">+</div>-->
<!--                    <input type="file" class="uploadbyclick hide">-->
                </div>


                <div id="uploadproductform" class="form-horizontal col-md-12">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">ชื่อ :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" id="name" placeholder="">
                        </div>
                    </div>


                    <input type="text" class="form-control productid hide" name="id" placeholder="">


                    <div class="form-group">
                        <label for="subtype" class="col-md-3 control-label">ประเภท :</label>
                        <div class="col-md-8">
                            <select id="subtype" name="subtype" class="form-control">
                                <option value="aaa">error</option>
                                <option value="aaa">error</option>
                                <option value="aaa">error</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-md-3 control-label">ราคา :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="price" name="price" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit" class="col-md-3 control-label">จำนวน :</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="unit" name="unit" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitnot" class="col-md-3 control-label">แจ้งเตือนเมื่อเหลือ :</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="unitnot" name="unitnot" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="detail" class="col-md-3 control-label">รายละเอียด :</label>
                        <div class="col-md-8">
                            <textarea style="height: 150px" class="form-control" id="detail" name="detail" placeholder=""></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <label for="detail" class="col-md-3 control-label"></label>
                        <div class="col-xs-3">
                            <button class=" btn bluebutton" id="addproduct_ok">เปลี่ยนแปลงข้อมูล</button>
                        </div>
                        <div class="col-md-2">
                            <button data-dismiss="modal" class=" btn yellowbutton" id="addproduct_ok">ยกเลิก</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

