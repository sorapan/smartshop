<div class="bigheader">รายการสั่งซื้อ</div>
<div class="col-md-12 card">
    <div class="cardbrand">รายการ</div>
    <div class="col-md-10 col-md-offset-1">
        <ul class="list-group">
            <?php

            foreach($basket_data as $b_v ){

            ?>

            <li class="list-group-item">
                <div class="container-fluid">
                    <div class="col-xs-4"><?= $b_v->name?></div>
                    <div class="col-xs-2"><?= $b_v->unit." ชิ้น"?></div>
                    <div class="col-xs-2"><?= $b_v->price." บาท"?></div>
                    <button class="close delete_basket_item"><span>&times;</span></button>
                </div>
            </li>

            <?php

            }

            ?>

        </ul>

    </div>
    <div class="form-horizontal">
        <div class="form-group">

            <div class="form-group">
                <label class="col-md-3 control-label">รวมราคาทั้งหมด : </label>
                <div class="col-md-9">
                    <p class="form-control-static"><?=$all_price." บาท"?></p>
                </div>
            </div>

        </div>
    </div>
    <a href="" style="width: 150px" class="col-md-offset-9 btn bluebutton">สั่งซื้อ</a>
</div>