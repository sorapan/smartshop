

<div class="bigheader">สมัครสมาชิก</div>

<div class="card">

    <div class="cardbrand marginbot">
        แบบฟอร์มสมัครสมาชิก
    </div>

<form  method="POST" action="<?=base_url()?>regis" class="form-horizontal"  accept-charset="UTF-8">

    <p class="col-xs-offset-3 text-info">* กรุณากรอกให้ครบทุกช่อง</p>
    <p class="col-xs-offset-3 text-danger"><?=$this->session->flashdata('formERR')?></p>
    <p class="col-xs-offset-3 text-danger"><?=$this->session->flashdata('usernameERR')?></p>
    <div class="form-group">
        <label for="username" class="col-md-3 control-label">ชื่อผู้ใช้ :</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้">
        </div>
    </div>

    <p class="col-xs-offset-3 text-danger"><?=$this->session->flashdata('passwordERR')?></p>
    <div class="form-group">
        <label for="password" class="col-md-3 control-label">รหัสผ่าน :</label>
        <div class="col-md-8">
            <input type="password" class="form-control" id="password" name="password"  placeholder="รหัสผ่าน">
        </div>
    </div>

    <div class="form-group">
        <label for="realname" class="col-md-3 control-label">ชื่อ :</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="realname" name="realname" placeholder="ชื่อ">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-md-3 control-label">นามสกุล :</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="นามสกุล">
        </div>
    </div>

    <div class="form-group">
        <p class="col-xs-offset-3 text-info">* กรอกที่อยู่ตามความเป็นจริง เพื่อประโยชน์ในการซื้อสินค้า</p>
        <label for="address" class="col-md-3 control-label">ที่อยู่ :</label>
        <div class="col-md-8">
            <textarea class="form-control" rows="4" id="address"  name="address" placeholder="ที่อยู่"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-md-3 control-label">อีเมล :</label>
        <div class="col-md-8">
            <input type="Email" class="form-control" id="email" name="email" placeholder="อีเมล">
        </div>
    </div>

    <div class="form-group">
        <label for="province" class="col-md-3 control-label">จังหวัด :</label>
        <div class="col-md-8">
            <select id="province" name="province" class="form-control">
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
        <label for="zipcode" class="col-md-3 control-label">รหัสไปรษณีย์ :</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="รหัสไปรษณีย์">
        </div>
    </div>

    <div class="form-group">
        <label for="tel" class="col-md-3 control-label">เบอร์โทรศัพท์ :</label>
        <div class="col-md-8">
            <input type="tel" class="form-control" id="tel" name="tel" placeholder="เบอร์โทรที่ติดต่อได้">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
            <button type="submit" class="btn bluebutton margintop">ตกลง</button>
        </div>
    </div>

</form>

</div>