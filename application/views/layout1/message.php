<div class="bigheader">ข้อความ</div>
<div class="card">
    <div class="cardbrand">
        ส่งข้อความ
    </div>
    <form class="form-horizontal">

        <div class="form-group">
            <label class="control-label col-xs-3">ข้อความ</label>
            <div class="col-xs-8">
                <textarea class="col-xs-8 form-control message" rows="4"></textarea>
            </div>
        </div>

        <button class="btn bluebutton col-xs-offset-3 sendmessage">ส่งข้อความ</button>
    </form>
</div>

<div class="card margintop">
    <div class="cardbrand">
        ข้อความจากแอดมิน
    </div>

    <table class="table-bordered table">
        <thead class="bluethead">
        <tr>
            <th>วันที่ส่ง</th>
<!--            <th>ชื่อผู้ส่ง</th>-->
            <th>ข้อความ</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach($msg as $val){

            ?>
            <tr>
                <td><?=date('d/m/Y - h:m:s น.', $val->date)?></td>
<!--                <td class="user_name">$val->user_name</td>-->
                <td class="msg_id hidden"><?=$val->id?></td>
                <td class="user_id hidden"><?=$val->user_id?></td>
                <td><?=$val->message?></td>
            </tr>
        <?php

        }

        ?>
        </tbody>
    </table>

</div>


<!--////////////////////////////////// modal //////////////////////////////////-->