<div class="bigheader">
    รายการสั่งซื้อ
</div>
<div class="card">

    <div class="cardbrand">
        รายการ
    </div>

    <?php

    if(isset($all_price)){

    ?>
    <div class="col-md-10 col-md-offset-1">
        <ul class="list-group list_data">

            <?php

            foreach($boughtdata as $b_v){

            ?>

                <li class="list-group-item">
                    <div class="container-fluid">
                        <div class="col-xs-4"><?= $b_v['name']?></div>
                        <div style="display:none" class="item_id col-xs-4"><?= $b_v['id']?></div>
                        <div class="col-xs-2"><?= $b_v['want']." ชิ้น"?></div>
                        <div class="col-xs-2"><?= $b_v['price']." บาท"?></div>
                        <button class="close delete_item_list"><span>&times;</span></button>
                    </div>
                </li>

            <?php
            }
            ?>

        </ul>

    </div>
    <div class="form-horizontal">

        <div class="form-group">
            <label class="col-md-4 control-label">สินค้าราคารวม : </label>
            <div class="col-md-4">
                <p class="form-control-static"><span id="item_price"><?=$all_price?></span> บาท</p>
            </div>
        </div>

<!--        <div class="form-group">-->
<!--            <label class="col-md-4 control-label">เลือกวิธีรับสินค้า : </label>-->
<!--            <div style="text-align: left" class="col-md-8 control-label">-->
<!--                <label>-->
<!--                    <input type="radio" name="howtosend" value="0" checked>-->
<!--                    <span class="howtosend_message">รับสินค้าด้วยตนเอง ( ไม่มีค่าใช้จ่ายเพิ่มเติม )</span>-->
<!--                </label>-->
<!--            </div>-->
<!--            <div style="text-align: left" class="col-md-8 col-md-offset-4 control-label">-->
<!--                <label>-->
<!--                    <input type="radio" name="howtosend" value="100">-->
<!--                    <span class="howtosend_message">ส่งทางไปรษณีย์ EMS ( ค่าบริการ 100 บาททุกกรณี )</span>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->

<!--        <hr>-->
<!---->
<!--        <div class="form-group">-->
<!--            <label class="col-md-4 control-label">ราคารวมทั้งหมด : </label>-->
<!--            <div class="col-md-4">-->
<!--                <p class="form-control-static"><span id="all_price"></span> บาท</p>-->
<!--            </div>-->
<!--        </div>-->

    </div>
    <!--    <a href="--><?//=base_url()?><!--takeitem/takebasket" style="width: 150px" class="col-md-offset-9 btn bluebutton margintop">สั่งซื้อ</a>-->
    <a href="<?=base_url().'signin'?>"  style="width: 150px" class="col-md-offset-9 btn bluebutton margintop">สั่งซื้อ</a>

    <?php

    }else{

    ?>

    <h2 class="text-center text-grey">ตะกร้าว่างเปล่า</h2>

    <?php

    }
    ?>

</div>