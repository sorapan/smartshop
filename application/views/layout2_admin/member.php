<div class="bigheader">ระบบจัดการสมาชิก</div>
<div class="card">
    <div class="cardbrand">รายชื่อสมาชิก</div>
    <table class="table">
        <thead class="bluethead">
            <tr>
                <th>#</th>
                <th>ชื่อสมาชิก</th>
                <th>ระดับ</th>
                <th>รายละเอียด</th>
                <th>การกระทำ</th>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($userdata as $user_val){
    ?>
            <tr>
                <td class="userid"><?=$user_val->id?></td>
                <td><?=$user_val->username?></td>
                <td><?=$user_val->class?></td>
                <td>
                    <button class="userdetail btn bluebutton" data-toggle="modal" data-target="#modal_userdetail">รายละเอียด</button>
                </td>
                <td>
                    <?php
                        if($user_val->id != $this->session->userdata('user_id')){
                    ?>
                    <button class="btn bluebutton edit_button" data-toggle="modal" data-target="#modal_edituser">แก้ไข</button>
                    <button class="btn yellowbutton del_button">ลบ</button>
                    <?php
                        }
                    ?>
                </td>
            </tr>
    <?php
        }
    ?>
        </tbody>
    </table>
</div>

<!--///////////////////////////////////////////-->

<div class="modal" id="modal_edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">แก้ไขข้อมูล</h4>
            </div>

            <div class="modal-body">

                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="col-xs-3 control-label">#</label>
                        <div class="col-xs-9">
                            <p class="form-control-static id"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">ชื่อผู้ใช้</label>
                        <div class="col-xs-9">
                            <p class="form-control-static username"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">รหัสผ่าน</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">ระดับ</label>
                        <div class="col-xs-9">
                            <select class="form-control class">
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">email</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">ชื่อจริง</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control realname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">นามสกุลจริง</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">เบอร์โทร</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control tel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">ที่อยู่</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">จังหวัด</label>
                        <div class="col-xs-9">
                            <select class="form-control province">
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
                        <label class="col-xs-3 control-label">รหัสไปรษณีย์</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control zipcode">
                        </div>
                    </div>


                </div>

            </div>

            <div class="modal-footer">
                <button class="btn bluebutton ok_edit">ตกลง</button>
                <button class="btn yellowbutton" data-dismiss="modal">ยกเลิก</button>
            </div>

        </div>
    </div>
</div>

<!--///////////////////////////////////////////-->

<div class="modal" id="modal_userdetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title header_username"></h4>
            </div>

            <div class="modal-body">

                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">#</label>
                        <div class="col-xs-9">
                            <p class="form-control-static id"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">ชื่อสมาชิก</label>
                        <div class="col-xs-9">
                            <p class="form-control-static username"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">รหัสผ่าน</label>
                        <div class="col-xs-9">
                            <p class="form-control-static password"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">ระดับ</label>
                        <div class="col-xs-9">
                            <p class="form-control-static class"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">email</label>
                        <div class="col-xs-9">
                            <p class="form-control-static email"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">ชื่อจริง</label>
                        <div class="col-xs-9">
                            <p class="form-control-static realname"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">นามสกุลจริง</label>
                        <div class="col-xs-9">
                            <p class="form-control-static lastname"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">เบอร์โทร</label>
                        <div class="col-xs-9">
                            <p class="form-control-static tel"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">ที่อยู่</label>
                        <div class="col-xs-9">
                            <p class="form-control-static address"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">จังหวัด</label>
                        <div class="col-xs-9">
                            <p class="form-control-static province"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">รหัสไปรษณีย์</label>
                        <div class="col-xs-9">
                            <p class="form-control-static zipcode"></p>
                        </div>
                    </div>
                </div>

            </div>

            <!--            <div class="modal-footer"></div>-->

        </div>
    </div>
</div>
