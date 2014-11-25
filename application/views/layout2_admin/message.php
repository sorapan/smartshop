<div class="bigheader">
    ข้อความ
</div>
<div class="card">
    <div class="cardbrand">
        รายการข้อความ
    </div>
    <table class="table-bordered table">
        <thead class="bluethead">
            <tr>
                <th>วันที่ส่ง</th>
                <th>ชื่อผู้ส่ง</th>
                <th>ดูข้อความ</th>
                <th>ตอบกลับ</th>
            </tr>
        </thead>
        <tbody>
        <?php

        foreach($data as $val){

            if($val->reply == "N"){
        ?>
            <tr>
                <td><?=date('d/m/Y - h:m:s น.', $val->date)?></td>
                <td class="user_name"><?=$val->user_name?></td>
                <td class="msg_id hidden"><?=$val->id?></td>
                <td class="user_id hidden"><?=$val->user_id?></td>
                <td class="date hidden"><?=$val->date?></td>
                <td style="padding: 15px 25px">
<!--                    <button class="btn bluebutton view-msg-button" data-toggle="modal" data-target="#view-msg">ดูข้อความ</button>-->
                    <?=$val->message?>
                </td>
                <td>
                    <p style="font-size:12px;color:#9e9e9e"><?=$val->reply=='N'?'* ยังไม่ตอบกลับ':''?></p>
                    <button class="btn yellowbutton reply-button" data-toggle="modal" data-target="#reply-msg">ตอบกลับ</button>

                </td>
            </tr>
        <?php

            }else{

        ?>

            <tr>
                <td><?=date('d/m/Y - h:m:s น.', $val->date)?></td>
                <td class="user_name"><?=$val->user_name?></td>
                <td class="msg_id hidden"><?=$val->id?></td>
                <td class="user_id hidden"><?=$val->user_id?></td>
                <td class="date hidden"><?=$val->date?></td>
                <td style="padding: 15px 25px">
                    <!--                    <button class="btn bluebutton view-msg-button" data-toggle="modal" data-target="#view-msg">ดูข้อความ</button>-->
                    <?=$val->message?>
                </td>
                <td>
                    <p style="font-size:12px;color:#9e9e9e"><?=$val->reply=='N'?'* ยังไม่ตอบกลับ':''?></p>
                    <button class="btn yellowbutton reply-button" data-toggle="modal" data-target="#reply-msg">ตอบกลับ</button>

                </td>
            </tr>

        <?php

            }

        }

        ?>
        </tbody>
    </table>
</div>

<div class="modal" id="view-msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">ดูข้อความ</h4>
            </div>
            <div class="modal-body">

                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-xs-3">ส่งโดย : </label>
                        <div class="col-xs-8">
                            <p class="form-control-static user_send_view"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">ข้อความ : </label>
                        <div class="col-xs-8">
                            <p class="form-control-static message_view"></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn bluebutton" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>


<!--/////////////////////////////-->


<div class="modal" id="reply-msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">ตอบกลับ</h4>
            </div>
            <div class="modal-body">

                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-xs-3">ส่งถึง : </label>
                        <div class="col-xs-8">
                            <p rows="5" class="form-control-static sendto"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">ข้อความ : </label>
                        <div class="col-xs-8">
                            <textarea rows="5" class="form-control msgreply"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn whitebutton" data-dismiss="modal">ปิด</button>
                <button class="btn bluebutton sendmsg col-xs-offset-3">ส่งข้อความ</button>
            </div>
        </div>
    </div>
</div>