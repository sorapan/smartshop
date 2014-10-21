<div class="bigheader">เคลมสินค้า</div>
<div class="card">
    <div class="cardbrand">รายการสินค้า</div>

    <div class="col-xs-10 col-xs-offset-1">

        <div class="form-horizontal">

            <div class="form-group">
                <label class="col-xs-2 control-label">ค้นหา</label>
                <div class="col-xs-8">
                    <input class="form-control search_box" type="text">
                </div>
                <button class="btn bluebutton clear_searchbox" >clear</button>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label">ค้นหาด้วย</label>
                <div class="col-xs-5">
                    <select class="search_by form-control">
                        <option value="product_name">ชื่อสินค้า</option>
                        <option value="crame_code">รหัสเคลม</option>
                        <option value="customer_name">ชื่อลูกค้า</option>
                    </select>
                </div>
            </div>

        </div>

    </div>

    <button class="btn bluebutton margintop add_list" data-toggle="modal" data-target="#add_list_modal">เพิ่มรายการ</button>
    <table class="table table-bordered table-c margintop">
        <thead class="bluethead">
            <tr>
                <th>รหัสเคลม</th>
                <th>ชื่อสินค้า</th>
                <th>ชื่อลูกค้า</th>
                <th>สถานะ</th>
                <th>วันที่เคลม</th>
                <th>รายละเอียด</th>
                <th>อัพเดทข้อมูล</th>
            </tr>
        </thead>
        <tbody class="warranty_body_data">
        <?php
        foreach($warrantydata as $val){
        ?>
            <tr>
                <td class="crame_id hidden"><?=$val->id?></td>
                <td class="crame_code"><?=$val->crame_code?></td>
                <td><?=$val->product_name?></td>
                <td><?=$val->customer_name?></td>
                <td class="crame_status"><?php

                    switch($val->status){
                        case 'waiting' :
                            echo 'รอซ่อม...';
                            break;
                        case 'inprogress' :
                            echo 'กำลังซ่อม...';
                            break;
                        case 'finished' :
                            echo 'เสร็จแล้ว';
                            break;
                    }

                    ?></td>
                <td><?=date('d/m/y',$val->date)?></td>
                <td><?=$val->detail?></td>
                <td>
                    <button class="bluebutton btn col-xs-12 update_status" data-toggle="modal" data-target="#update_list_modal">สถานะ</button><br>
                    <button class="yellowbutton btn col-xs-12 delete_list">ลบ</button>
                </td>

            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>

<div class="modal" id="add_list_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มรายการเคลมสินค้า</h4>
            </div>
            <div class="modal-body">

                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-xs-3">ชื่อสินค้า</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control productname">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">ชื่อผู้ส่งเคลม</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control customername">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">รายละเอียด<br>(อาการ)</label>
                        <div class="col-xs-8">
                            <textarea rows="6" class="form-control productdetail"></textarea>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn yellowbutton" data-dismiss="modal">ปิดหน้าต่าง</button>
                <button type="button" class="btn bluebutton submit_add_list_form">ตกลง</button>
            </div>
        </div>
    </div>
</div>

<!--/////////////////////////////////////////////-->

<div class="modal" id="update_list_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มรายการเคลมสินค้า</h4>
            </div>
            <div class="modal-body">

                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">สถานะ</label>
                        <div class="col-xs-8">
                            <select class="form-control status_update">
                                <option value="waiting">รอซ่อม...</option>
                                <option value="inprogress">กำลังซ่อม...</option>
                                <option value="finished">เสร็จแล้ว</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="got_cramecode hidden"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn yellowbutton" data-dismiss="modal">ปิดหน้าต่าง</button>
                <button type="button" class="btn bluebutton submit_update_list_form">ตกลง</button>
            </div>
        </div>
    </div>
</div>