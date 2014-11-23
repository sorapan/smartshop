
<div class="col-md-12 bigheader">รายการที่สั่งซื้อแล้ว</div>

<div class="col-xs-12 card marginbot">
    <div class="cardbrand">ขั้นตอน</div>
    <ol class="breadcrumb arrow">
        <li>หยิบสินค้าใส่ตะกร้า</li>
        <li>ยืนยันการซื้อ</li>
        <li class="active">ยืนยันการโอนเงิน</li>
        <li>รอการตรวจสอบจากแอดมิน</li>
    </ol>
</div>

<div class="col-md-12 card">

    <div class="cardbrand">
        รายการ
    </div>

    <div class="col-md-10 col-md-offset-1 margintop">
        <ul class="list-group list_data">
            <?php
            foreach($basket_data as $b_v ){
                ?>
                <li class="list-group-item">
                    <div class="container-fluid">
                        <div class="col-xs-4"><?= $b_v->name?></div>
                        <div style="display:none" class="item_id col-xs-4"><?= $b_v->id?></div>
                        <div class="col-xs-4"><?= $b_v->unit." ชิ้น"?></div>
                        <div class="col-xs-4"><?= number_format($b_v->price)." บาท"?></div>
                    </div>
                </li>

            <?php
            }

            if($sendby != 'none'){
            ?>

            <li class="list-group-item">
                <div class="container-fluid">
                    <div class=" col-xs-4">ส่งไปรษณีย์ EMS</div>
                    <div class="col-xs-offset-4 col-xs-4">100 บาท</div>
                </div>
            </li>

            <?php

            }
            ?>

        </ul>

<!--        <div class="text-info margintop">--><?//= $sendby == 'none' ? 'รับด้วยตนเอง' : 'ส่งไปรษณีย์ EMS'?><!--</div>-->
        <div class="text-info bought_id hidden"><?= $boughtid ?></div>
        <div style='text-align: right;' class=" col-xs-12 marginbot"><h4>ราคารวมทั้งหมด <span style="text-decoration: underline;color:red"><?=$all_price?></span> บาท</h4></div>

        <button class="col-xs-offset-2 col-xs-4 btn bought_back whitebutton" style="margin-right: 5px">ย้อนไปหน้ายืนยันการซื้อ</button>
        <button class="col-xs-4 btn yellowbutton bought_cancel">ยกเลิกการซื้อ</button>

    </div>

    <div class="col-md-12">
        <hr>

        <span class="col-xs-offset-4 text-warning"> ** จำเป็นต้องกรอก</span>

        <form class="form-horizontal margintop" enctype="multipart/form-data"  method="post" action="takeitem/towaitinglist" >

            <div class="form-group">
                <label class="col-xs-4 control-label">จำนวนเงินที่โอน </label>
                <div class="form-inline col-xs-4">
                    <input type="text" class="form-control" name="money"><span style="margin: 0 0 0 10px">บาท<span class="text-warning"> **</span></span>
                </div>
            </div>

            <div class="form-group">

                <label class="col-xs-4 control-label">วันที่ </label>
                <div class="col-xs-7">
                    <div class="form-inline">
                        <select name="day" class="form-control pay_day"></select>
                        <select name="mon" class="form-control pay_month">
                            <option value="jan">มกราคม</option>
                            <option value="fab">กุมภาพันธ์</option>
                            <option value="mar">มีนาคม</option>
                            <option value="apr">เมษายน</option>
                            <option value="may">พฤษภาคม</option>
                            <option value="jun">กรกฎาคม</option>
                            <option value="jul">มิถุนายน</option>
                            <option value="aug">สิงหาคม</option>
                            <option value="sep">กันยายน</option>
                            <option value="oct">ตุลาคม</option>
                            <option value="nov">พฤศจิกายน</option>
                            <option value="dec">ธันวาคม</option>
                        </select>
                        <select name="year" class="form-control pay_year"></select>
                    </div>
                </div>

            </div>

            <div class="form-group">

                <label class="col-xs-4 control-label">เวลา </label>
                <div class="col-xs-5">

                    <input name="time" type="text" class="form-control">
                    <span class="text-info">
                        ** (การกรอกเวลาสามารถทำได้อย่างอิสระ เช่น 2.40 น, 14.40 น, บ่ายสองโมงสี่สิบนาที เป็นต้น)
                    </span>

                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-4 control-label">ใบเสร็จโอนเงิน </label>
                <div class="col-xs-4">
                    <input name="bill_file" id="file" type="file">
                </div>
                <span class="col-xs-4" style="color:red"> ** อาจจะไม่มีก็ได้ **</span>
            </div>
            <div class="form-group margintop">
                <button type="submit" class="col-xs-offset-5 col-xs-2 btn bluebutton">ตกลง</button>
            </div>

        </form>

        <h4 class="text-danger col-xs-offset-4 margintop"><?=$this->session->flashdata('towaitinglistwarn')?></h4>

    </div>

</div>
