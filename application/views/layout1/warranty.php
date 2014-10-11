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

    <table class="table table-bordered table-c margintop">
        <thead>
        <tr>
            <th>รหัสเคลม</th>
            <th>ชื่อสินค้า</th>
            <th>ชื่อลูกค้า</th>
            <th>วันที่เคลม</th>
            <th>รายละเอียด</th>
            <th>สถานะ</th>
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
                <td><?=date('d/m/y',$val->date)?></td>
                <td><?=$val->detail?></td>
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
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>