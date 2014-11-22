

<div class="col-xs-12 bigheader">รายการสั่งซื้อ</div>

<div class="col-xs-12 card marginbot">
    <div class="cardbrand">ขั้นตอน</div>
    <ol class="breadcrumb arrow">
        <li>หยิบสินค้าใส่ตะกร้า</li>
        <li class="active">ยืนยันการซื้อ</li>
        <li>ยืนยันการโอนเงิน</li>
        <li>รอการตรวจสอบจากแอดมิน</li>
    </ol>
</div>

<div class="col-xs-12 card ">

    <?php
    if(!empty($basket_data)){
    ?>

    <div class="cardbrand">รายการ</div>
    <div class="col-xs-10 col-xs-offset-1">
        <ul class="list-group list_data">

            <?php
            foreach($basket_data as $b_v ){
            ?>

            <li class="list-group-item">
                <div class="container-fluid">
                    <div class="col-xs-4"><?= $b_v->name?></div>
            <?php

                if($b_v->promotion_id == null){

            ?>
                    <div class="item_id col-xs-4 hidden"><?= $b_v->id?></div>
                    <div class="col-xs-2"><?= $b_v->unit." ชิ้น"?></div>
            <?php

                }else{

            ?>
                    <div  class="item_id col-xs-4 hidden"><?= $b_v->promotion_id?></div>
                    <div  class="item_date col-xs-4 hidden"><?= $b_v->date?></div>
                    <div class="col-xs-2"><?= "1 ชิ้น"?></div>
            <?php

                }

            ?>
                    <div class="col-xs-2"><?= $b_v->price." บาท"?></div>
            <?php

            if($b_v->promotion_id == null){

            ?>
                    <button class="close delete_item_list"><span>&times;</span></button>
            <?php

            }else{

            ?>
                    <button class="close delete_item_list_promotion"><span>&times;</span></button>
            <?php
            }
            ?>
                </div>
            </li>

            <?php
            }
            ?>

        </ul>

    </div>
    <div class="form-horizontal">

        <div class="form-group">
            <label class="col-xs-4 control-label">สินค้าราคารวม : </label>
            <div class="col-xs-4">
                <p class="form-control-static"><span id="item_price"><?=$all_price?></span> บาท</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-4 control-label">เลือกวิธีรับสินค้า : </label>
            <div style="text-align: left" class="col-xs-8 control-label">
                <label>
                    <input type="radio" name="howtosend" value="0" checked>
                    <span class="howtosend_message">รับสินค้าด้วยตนเอง ( ไม่มีค่าใช้จ่ายเพิ่มเติม )</span>
                </label>
            </div>
            <div style="text-align: left" class="col-xs-8 col-xs-offset-4 control-label">
                <label>
                    <input type="radio" name="howtosend" value="100">
                    <span class="howtosend_message">ส่งทางไปรษณีย์ EMS ( ค่าบริการ 100 บาททุกกรณี )</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-4 control-label">ที่อยู่ : </label>
            <div style="text-align: left" class="col-xs-8 control-label">
                <label>
                    <input type="radio" name="address" value="profile_address" checked>
                    <span>ที่อยู่ตามที่กรอกไว้ใน Profile</span>
                </label>
            </div>
            <div style="text-align: left" class="col-xs-8 col-xs-offset-4 control-label">
                <label>
                    <input type="radio" name="address" value="new_addresss">
                    <span>ที่อยู่ใหม่</span>
                </label>
                    <div class="form-horizontal margintop">

                        <div class="form-group">
                            <label class="control-label col-xs-3">ชื่อผู้รับ :</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control lockinput user_realname" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">ที่อยู่ :</label>
                            <div class="col-xs-6">
                            <textarea class="form-control lockinput new_address" rows="4" disabled></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">จังหวัด :</label>
                            <div class="col-xs-6">
                                <select class="form-control lockinput province" disabled>
                                    <option value="" selected>--------- เลือกจังหวัด ---------</option>
                                    <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                    <option value="กระบี่">กระบี่ </option>
                                    <option value="กาญจนบุรี">กาญจนบุรี </option>
                                    <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                    <option value="กำแพงเพชร">กำแพงเพชร </option>
                                    <option value="ขอนแก่น">ขอนแก่น</option>
                                    <option value="จันทบุรี">จันทบุรี</option>
                                    <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                    <option value="ชัยนาท">ชัยนาท </option>
                                    <option value="ชัยภูมิ">ชัยภูมิ </option>
                                    <option value="ชุมพร">ชุมพร </option>
                                    <option value="ชลบุรี">ชลบุรี </option>
                                    <option value="เชียงใหม่">เชียงใหม่ </option>
                                    <option value="เชียงราย">เชียงราย </option>
                                    <option value="ตรัง">ตรัง </option>
                                    <option value="ตราด">ตราด </option>
                                    <option value="ตาก">ตาก </option>
                                    <option value="นครนายก">นครนายก </option>
                                    <option value="นครปฐม">นครปฐม </option>
                                    <option value="นครพนม">นครพนม </option>
                                    <option value="นครราชสีมา">นครราชสีมา </option>
                                    <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                    <option value="นครสวรรค์">นครสวรรค์ </option>
                                    <option value="นราธิวาส">นราธิวาส </option>
                                    <option value="น่าน">น่าน </option>
                                    <option value="นนทบุรี">นนทบุรี </option>
                                    <option value="บึงกาฬ">บึงกาฬ</option>
                                    <option value="บุรีรัมย์">บุรีรัมย์</option>
                                    <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                    <option value="ปทุมธานี">ปทุมธานี </option>
                                    <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                    <option value="ปัตตานี">ปัตตานี </option>
                                    <option value="พะเยา">พะเยา </option>
                                    <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                    <option value="พังงา">พังงา </option>
                                    <option value="พิจิตร">พิจิตร </option>
                                    <option value="พิษณุโลก">พิษณุโลก </option>
                                    <option value="เพชรบุรี">เพชรบุรี </option>
                                    <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                    <option value="แพร่">แพร่ </option>
                                    <option value="พัทลุง">พัทลุง </option>
                                    <option value="ภูเก็ต">ภูเก็ต </option>
                                    <option value="มหาสารคาม">มหาสารคาม </option>
                                    <option value="มุกดาหาร">มุกดาหาร </option>
                                    <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                    <option value="ยโสธร">ยโสธร </option>
                                    <option value="ยะลา">ยะลา </option>
                                    <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                    <option value="ระนอง">ระนอง </option>
                                    <option value="ระยอง">ระยอง </option>
                                    <option value="ราชบุรี">ราชบุรี</option>
                                    <option value="ลพบุรี">ลพบุรี </option>
                                    <option value="ลำปาง">ลำปาง </option>
                                    <option value="ลำพูน">ลำพูน </option>
                                    <option value="เลย">เลย </option>
                                    <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                    <option value="สกลนคร">สกลนคร</option>
                                    <option value="สงขลา">สงขลา </option>
                                    <option value="สมุทรสาคร">สมุทรสาคร </option>
                                    <option value="สมุทรปราการ">สมุทรปราการ </option>
                                    <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                    <option value="สระแก้ว">สระแก้ว </option>
                                    <option value="สระบุรี">สระบุรี </option>
                                    <option value="สิงห์บุรี">สิงห์บุรี </option>
                                    <option value="สุโขทัย">สุโขทัย </option>
                                    <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                    <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                    <option value="สุรินทร์">สุรินทร์ </option>
                                    <option value="สตูล">สตูล </option>
                                    <option value="หนองคาย">หนองคาย </option>
                                    <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                    <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                    <option value="อุดรธานี">อุดรธานี </option>
                                    <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                    <option value="อุทัยธานี">อุทัยธานี </option>
                                    <option value="อุบลราชธานี">อุบลราชธานี</option>
                                    <option value="อ่างทอง">อ่างทอง </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">รหัสไปรษณีย์ :</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control lockinput zipcode" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">โทร :</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control lockinput tel" disabled>
                            </div>
                        </div>

                    </div>
            </div>
        </div>

        <hr>

        <div class="form-group">
            <label class="col-xs-4 control-label">ราคารวมทั้งหมด : </label>
            <div class="col-xs-4">
                <p class="form-control-static"><span class="all_price"></span> บาท</p>
            </div>
        </div>

    </div>
<!--    <a href="--><?//=base_url()?><!--takeitem/takebasket" style="width: 150px" class="col-xs-offset-9 btn bluebutton margintop">สั่งซื้อ</a>-->
    <a id="buy_it_now" style="width: 150px" class="col-xs-offset-9 btn bluebutton margintop">สั่งซื้อ</a>

    <?php
    }else{
    ?>

        <h2 class="text-center text-grey">ตะกร้าว่างเปล่า</h2>

    <?php
    }
    ?>

</div>