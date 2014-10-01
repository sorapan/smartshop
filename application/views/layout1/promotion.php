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

                <p class="hidden promotion_id"><?=$promval->id?></p>
                <div class="form-group">
                    <label class="control-label col-xs-3">ชื่อโปรโมชั่น</label>
                    <div class="col-xs-8">
                        <p class="form-control-static promotion_name"><?=$promval->promotion_name?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">ราคา</label>
                    <div class="col-xs-8">
                        <p class="form-control-static promotion_price"><?=$promval->price." บาท"?></p>
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
                <button class="btn bluebutton buy_promotion">ซื้อโปรโมชั่น</button>
            </div>

        </div>


    <?php

        }

    ?>
