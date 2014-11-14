
<div class="bigheader">
    จัดการโปรโมชั่น
</div>
<div class=" card ">
    <div class="cardbrand">
        รายการโปรโมชั่น
    </div>

    <table class="table table-bordered">
        <thead class="bluethead">
            <tr>
                <th>#</th>
                <th>โปรโมชั่น</th>
                <th>ราคา(บาท)</th>
                <th>รายละเอียด</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($promotiondata as $val){
        ?>
            <tr>
                <td class="promotionid"><?=$val->id?></td>
                <td><?=$val->promotion_name?></td>
                <td><?=$val->price?></td>
                <td><?=$val->detail?></td>
                <td>
                    <button class="btn bluebutton col-xs-12" data-toggle="modal" data-target="#editpromotion_modal">แก้ไข</button>
                    <button class="btn yellowbutton deletepromotion col-xs-12">ลบ</button>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

</div>


<!-- Modal -->

<div class="modal" id="editpromotion_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">แก้ไขโปรโมชั่น</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn whitebutton" data-dismiss="modal">Close</button>
                <button type="button" class="btn bluebutton">Save changes</button>
            </div>
        </div>
    </div>
</div>
