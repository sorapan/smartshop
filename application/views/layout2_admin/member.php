<div class="bigheader">ระบบจัดการสมาชิก</div>
<div class="card">
    <div class="cardbrand">รายชื่อสมาชิก</div>
    <table class="table">
        <thead>
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

            </div>

            <div class="modal-footer"></div>

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
