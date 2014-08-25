
<div class="col-md-12 bigheader">รายการที่สั่งซื้อแล้ว</div>
<div class="col-md-12 card">

    <div class="cardbrand">
        <center>รายการ</center>
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
                        <div class="col-xs-4"><?= $b_v->price." บาท"?></div>
                    </div>
                </li>

            <?php
            }
            ?>
        </ul>

        <button class="col-xs-offset-5 col-xs-2 btn yellowbutton">ยกเลิกการซื้อ</button>

    </div>

    <div class="col-md-12">
        <hr>

        <form class="form-horizontal" enctype="multipart/form-data"  method="post" action="takeitem/towaitinglist" >

            <div class="form-group">
                <label class="col-xs-4 control-label">จำนวนเงินที่โอน </label>
                <div class="form-inline col-xs-4">
                    <input type="text" class="form-control" name="money"><span style="margin: 0 0 0 10px">บาท</span>
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
                <div class="col-xs-4">

                    <input name="time" type="text" class="form-control">
                    <span class="text-info">
                        ** การกรอกเวลาสามารถทำได้อย่างอิสระ เช่น 2.40 น, 14.40 น, บ่ายสองโมงสี่สิบนาที เป็นต้น **
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
    </div>

</div>
