
    <div class="col-xs-12 bigheader">ยินดีต้อนรับ</div>
    <div class="col-xs-12 card">
            <div class="cardbrand" style="font-size: 3em"><?=!empty($blogdata)?$blogdata[0]->header:'ยินดีต้อนรับ'?></div>
            <div class="blog_div_content">
                <?=!empty($blogdata)?$blogdata[0]->content:'ข้อมูลว่างเปล่า'?>
            </div>
    </div>

    <div class="col-xs-12 card margintop">
        <div class="cardbrand">
            รายการสินค้าล่าสุด
        </div>

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
                        <p>ราคา : <span class="product_price"><?=number_format($p_val->price)?></span> บาท</p>
<!--                        <p>จำนวน : <span class="product_unit">-->
<!--                                $p_val->unit-->
<!--                            </span> ชิ้น</p>-->

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

    <!--////////////////////////////-->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="addtobasket_name"><?='ชื่อสินค้า'?></h4>
                </div>
                <div class="modal-body">

<!--                    <div class="col-xs-12 marginbot">-->
<!--                        <div id="addtobasket_img" class="col-xs-10 col-xs-offset-1"></div>-->
<!--                    </div>-->

                    <form class="form-horizontal">

<!--                        <div class="form-group">-->
<!--                            <label class="col-xs-4 control-label">มีอยู่จำนวน</label>-->
<!--                            <div class="col-xs-8">-->
<!--                                <p class="form-control-static" id="addtobasket_unit"></p>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="form-group">
                            <label class="col-xs-4 control-label">ชื่อสินค้า</label>
                            <div class="col-xs-8">
                                <p class="form-control-static" id="addtobasket_name2"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">ราคา</label>
                            <div class="col-xs-8">
                                <p class="form-control-static" id="addtobasket_price"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label" for="add_unit" >จำนวนที่อยู่ในตะกร้า </label>
                            <div class="col-xs-4">
                                <p  class=" form-control-static" id="init_unit"></p>
                            </div>
                        </div>

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
<!--                            <label class="col-xs-4 control-label">มีอยู่จำนวน</label>-->
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
                            <div class="col-xs-8 col-xs-offset-3 margintop">
                                    <div style="min-height: 150px;padding: 5px;border: 1px blue solid;padding: 5px;word-break:break-all; line-height: 18px" class="form-control-static" id="detail_detail"></div>
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
