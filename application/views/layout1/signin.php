<div class="bigheader">
    เข้าสู่ระบบ
</div>
<div class="card">
    <div class="cardbrand marginbot">
        เข้าสู่ระบบ
    </div>
    <form class="form-horizontal" method="post" action="<?=base_url()?>login">

        <div class="form-group">
            <label class="control-label col-xs-3">ชื่อผู้ใช้</label>
            <div class="col-xs-5">
                <input type="text" class="form-control"  name="userlogin">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3">รหัสผ่าน</label>
            <div class="col-xs-5">
                <input type="password" class="form-control" name="passlogin">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-5 col-xs-offset-3">
                <button type="submit" class="btn bluebutton">เข้าสู่ระบบ</button>
            </div>
        </div>

        <h4 class="text-danger col-xs-offset-3 margintop"><?=$this->session->flashdata('loginmessage')?></h4>

    </form>

    <h4 class="col-xs-offset-3">
        ถ้ายังไม่สมัครสมาชิก <a style="color:red" href="<?=base_url()?>regisform">คลิกที่นี่</a>
    </h4>

</div>