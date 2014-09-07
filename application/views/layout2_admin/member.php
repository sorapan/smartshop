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
                <td><?=$user_val->id?></td>
                <td><?=$user_val->username?></td>
                <td><?=$user_val->class?></td>
                <td>
                    <button class="userdetail btn bluebutton" data-toggle="modal" data-target="#modal_userdetail">รายละเอียด</button>
                </td>
                <td>
                    <button class="btn bluebutton">แก้ไข</button>
                    <button class="btn yellowbutton">ลบ</button>
                </td>
            </tr>
    <?php
        }
    ?>
        </tbody>
    </table>
</div>

<!--///////////////////////////////////////////-->

<div class="modal" id="modal_userdetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addtobasket_name">รายละเอียดสมาชิก</h4>
            </div>

            <div class="modal-body">
            </div>

            <!--            <div class="modal-footer"></div>-->

        </div>
    </div>
</div>
