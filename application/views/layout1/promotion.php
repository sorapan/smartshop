<div class="bigheader">
    โปรโมชั่น
</div>


        <?php

       //var_dump($promotionlist[0]->promotiondata[0]->unit);

        foreach($promotionlist as $promval){
        ?>

        <div class="card marginbot">

            <div class="cardbrand"><?=$promval->promotion_name?></div>

            <div style="font-weight: bold;font-size: 16px" >รายการสินค้า</div><br>

<!--            <ul class="list-group col-xs-12">-->
            <ul class="media-list">
        <?php

            foreach($promval->promotiondata as $val){

                foreach($val->productdata as $pv){
        ?>

                    <li class="media" style="background-color: #e6e6e6">
                        <div class="pull-left">
                            <img style="width: 64px" src="<?=base_url()?>productImg/<?=$pv->img?>">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?=$pv->name.' จำนวน <span style="color:red;">'.$val->unit.'</span> ชิ้น '?></h4>
                            <p class="hidden productid"><?=$pv->id?></p>
                            <p class="hidden product_name"><?=$pv->name?></p>
                            <p class="hidden product_price"><?=$pv->price?></p>
                            <p class="hidden product_unit"><?=$pv->unit?></p>
                            <a class="getdetail_inpromotion" data-toggle="modal" data-target="#detailmodal" >ดูรายละเอียด</a>
                        </div>
                    </li>

<!--                    echo base_url()."productImg/".$pv->img-->


        <?php

                }
            }

        ?>
           </ul>
            <hr>
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
                <?php

                if($this->session->userdata('class') == 'user'){

                ?>
                <button class="btn bluebutton buy_promotion">หยิบใส่ตะกร้า</button>
                <?php

                }else if($this->session->userdata('class') != 'admin'){

                ?>
                <button class="btn bluebutton buy_promotion_nonmember">หยิบใส่ตะกร้า</button>
                <?php
                }else{
                ?>

                <?php
                }
                ?>
            </div>

        </div>


    <?php

        }

    ?>

<!--modal-->


<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <label class="col-xs-4 control-label">มีอยู่จำนวน</label>
                        <div class="col-xs-8">
                            <p class="form-control-static" id="detail_unit"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label">ราคา</label>
                        <div class="col-xs-8">
                            <p class="form-control-static" id="detail_price"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label">รายละเอียด</label>
                        <div class="col-xs-8">
                            <p style="max-height: 250px;overflow-y: scroll;padding: 5px;word-break:break-all; border:1px solid #4cabda; line-height: 18px"  class="form-control-static" id="detail_detail"></p>
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
