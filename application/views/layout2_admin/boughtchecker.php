<div class="bigheader">ตรวจสอบการซื้อสินค้า</div>

<div class="card col-xs-12">
    <div class="cardbrand">แสดงรายการ</div>
    <div style="margin-left: 50px;">
        <div class="radio">

            <label style="margin-right:15px;color:black;font-weight:bolder">
                <input type="radio" class="show_list" id="optionsRadios1" name="show" value="1" checked>
                แสดงทั้งหมด
            </label>
        </div>
        <div class="radio">
            <label style="margin-right:15px;color:black;font-weight:bolder">
                <input type="radio" class="show_list" id="optionsRadios1" name="show" value="2">
                แสดงรายการยังไม่โอนเงิน
            </label>
        </div>
        <div class="radio">
            <label style="margin-right:15px;color:#fda401;font-weight:bolder">
                <input type="radio" class="show_list" id="optionsRadios1" name="show" value="3">
                แสดงรายการที่โอนเงินแล้ว
            </label>
        </div>
        <div class="radio">
            <label style="margin-right:15px;color:#007f01;font-weight:bolder">
                <input type="radio" class="show_list" id="optionsRadios1" name="show" value="4">
                แสดงรายการที่ยืนยันแล้ว
            </label>
        </div>
        <div class="radio">
            <label style="color:red;font-weight:bolder">
                <input type="radio" class="show_list" id="optionsRadios1" name="show" value="5">
                แสดงรายการที่เกิน 7 วัน
            </label>

        </div>
        </div>

    </div>

<div class="card col-xs-12 margintop">
    <div class="cardbrand">รายการ</div>
    <table class="table table-bordered table-condensed table-striped">
        <thead class="bluethead">
            <tr>
                <th>#</th>
                <th>ชื่อผู้ซื้อ</th>
                <th>ราคารวม</th>
                <th>ส่งโดยวิธี</th>
                <th>ยืนยันแล้ว</th>
                <th>ซื้อเมื่อ</th>
                <th>สถานะโอนเงิน</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody class="show_data_list">
        <?php
        foreach($boughtlist_data as $bval){
        ?>
            <tr>
                <td class="boughtlist_id"><?=$bval->id?></td>
                <td><?=$bval->username?></td>
                <td class="hidden user_id"><?=$bval->user?></td>
                <td class="hidden cart_id"><?=$bval->date?></td>
                <td class="hidden bill_img"><?=$bval->cash_img?></td>
                <td><?=$bval->price?></td>
                <td><?=$bval->sendby == 'none'? 'รับด้วยตัวเอง' : 'ส่ง EMS' ?></td>
                <td><?php
                    if(floor((time()-$bval->date)/86400) > 7 && $bval->cash == null){ echo '<span style="color:red">';}
                    else if($bval->cash != null && $bval->verified != 'Y'){echo '<span style="color:orange">';}
                    else if($bval->cash != null && $bval->verified == 'Y'){echo '<span style="color:green">'; }
                    else{echo '<span style="color:black">'; }
                        echo $bval->verified == 'Y'? 'ใช่' : 'ไม่';
                    if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null || $bval->cash != null && $bval->verified != 'Y' || $bval->cash != null && $bval->verified == 'Y'){ echo '</span>';}
                    ?>
                </td>
                <td>
                <?php

                if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null){ echo '<span style="color:red">';}
                else if($bval->cash != null && $bval->verified != 'Y'){echo '<span style="color:orange">';}
                else if($bval->cash != null && $bval->verified == 'Y'){echo '<span style="color:green">'; }
                else{echo '<span style="color:black">'; }
                    echo  floor((time() - $bval->date)/86400).' วันที่แล้ว';
                if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null || $bval->cash != null && $bval->verified != 'Y' || $bval->cash != null && $bval->verified == 'Y'){ echo '</span>';}

                ?>
                </td>
                <td>
                <?php

                    if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null){ echo '<span style="color:red">';}
                    else if($bval->cash != null && $bval->verified != 'Y'){echo '<span style="color:orange">';}
                    else if($bval->cash != null && $bval->verified == 'Y'){echo '<span style="color:green">'; }
                    else{echo '<span style="color:black">'; }
                    echo $bval->cash == null ? 'ยังไม่ได้โอน' : 'โอนแล้ว';
                    if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null || $bval->cash != null && $bval->verified != 'Y' || $bval->cash != null && $bval->verified == 'Y'){ echo '</span>';}

                ?>
                </td>
                <td>
                <?php
                    if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null){

                        echo '<button class="btn yellowbutton col-xs-12 delete_boughtlist">ลบ</button>';

                    }else if($bval->cash != null && $bval->verified != 'Y'){

                        echo '<button class="btn yellowbutton col-xs-12 delete_boughtlist">ลบ</button>';

                    }else if($bval->cash == null && $bval->verified != 'Y'){

                        echo '<button class="btn yellowbutton col-xs-12 delete_boughtlist">ลบ</button>';

                    }
                ?>

                    <button class="btn bluebutton col-xs-12 basket_detail" data-toggle="modal" data-target="#modal_basketdata">ดูรายละเอียด</button>

                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>

<!--===============================-->

<div class="modal" id="modal_basketdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addtobasket_name">รายชื่อสินค้า</h4>
            </div>

            <div class="modal-body">
            </div>

            <!--            <div class="modal-footer"></div>-->

        </div>
    </div>
</div>