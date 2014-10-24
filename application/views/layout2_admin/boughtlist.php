<div class="col-xs-12 bigheader">
        ยืนยันข้อมูลการซื้อ
</div>

<div class="col-xs-12 card">

    <div class="cardbrand">ตารางรายการ</div>
    <div class="col-xs-12 margintop">

        <?php

        if(count($wait_listdata)){

        ?>

        <table class="table table-bordered table-condensed table-striped">

            <thead class="bluethead">
                <tr>
                    <th class="hidden">#</th>
                    <th>ผู้ซื้อ</th>
                    <th>วิธีส่ง</th>
                    <th>เงินที่ต้องจ่าย</th>
                    <th>เงินที่ลูกค้าจ่าย</th>
                    <th>วันที่</th>
                    <th>เวลา</th>
                    <th>ภาพสลิป</th>
                    <th>การกระทำ</th>
                </tr>
            </thead>
            <tbody>

            <?php


            foreach($wait_listdata as $b_val){
            ?>

            <tr>
                <td class="hidden"><?=$b_val->id?></td>
                <td><?=$b_val->username?></td>
                <td class="hidden userid"><?=$b_val->userid?></td>
                <td class="hidden cartid"><?=$b_val->cartID?></td>
                <td><?=$b_val->send=='none' ? 'รับด้วยตัวเอง' : 'ส่ง EMS' ?></td>
                <td><?=$b_val->price?> บาท</td>
                <td><?=$b_val->money?> บาท </td>
                <td><?=date("d.m.Y",$b_val->date)?> </td>
                <td><?=$b_val->time?> </td>
                <?php
                if($b_val->bill_dir !== NULL){
                    ?>
                    <td><a class="bill_img" data-toggle="modal" data-target="#modal_slip" www='../bill_img/<?=$b_val->bill_dir?>'>คลิ๊ก</a></td>
                <?php
                }else{
                ?>
                    <td> - </td>
                <?php
                }
                ?>
                <td>
                    <a class="bought_verify badge badge-red">ยืนยันการซื้อ</a>
                    <a class="basket_detail badge" data-toggle="modal" data-target="#modal_basketdata">รายละเอียด</a>
                </td>
            </tr>

            <?php
            }
            }else{

                echo '<h2 class="text-center text-grey marginbot">ข้อมูลว่างเปล่า</h2>';

            }
            ?>

            </tbody>
        </table>
    </div>

</div>


<div class="modal" id="modal_slip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addtobasket_name">ภาพสลิป</h4>
            </div>

            <div class="row">
                <div class="modal-body">
                </div>
            </div>

<!--            <div class="modal-footer"></div>-->

        </div>
    </div>
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