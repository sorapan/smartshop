<div class="bigheader">
    โปรโมชั่น
</div>


        <?php
        foreach($promotionlist as $promval){
        ?>

        <div class="card marginbot">

            <div class="cardbrand"><?=$promval->promotion_name?></div>

            <div style="font-weight: bold;font-size: 16px" >รายการสินค้า</div><br>

            <ul class="list-group col-xs-12">
        <?php

            foreach($promval->promotiondata as $val){

                foreach($val->productdata as $pv){
        ?>

                    <li class="list-group-item"><?=$pv->name?></li>
<!--                    echo base_url()."productImg/".$pv->img-->


        <?php

                }
            }

        ?>
           </ul>

            <div class="form-horizontal" style="line-height: 16px">

                <div class="form-group">
                    <label class="control-label col-xs-3">ชื่อโปรโมชั่น</label>
                    <div class="col-xs-8">
                        <p class="form-control-static"><?=$promval->promotion_name?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">ราคา</label>
                    <div class="col-xs-8">
                        <p class="form-control-static"><?=$promval->price." บาท"?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">รายละเอียด</label>
                    <div class="col-xs-8">
                        <p class="form-control-static"><?=$promval->detail?></p>
                    </div>
                </div>

            </div>

            <hr>

            <div>
                <button class="btn bluebutton">ซื้อโปรโมชั่น</button>
                <button class="btn yellowbutton">ยกเลิก</button>
            </div>

        </div>


    <?php

        }

    ?>
