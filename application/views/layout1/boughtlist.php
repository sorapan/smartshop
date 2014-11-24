<div class="bigheader">
    รายการที่สั่งซื้อไว้แล้ว
</div>

<div class="col-xs-12 card">

    <div class="cardbrand">รายการที่กำลังรอ</div>
    <div class="col-xs-12 margintop">

        <?php

        if(count($wait_listdata)){

        ?>

        <table class="table table-bordered">

            <thead class="bluethead">
            <tr>
                <th>รหัสการสั่งซื้อ</th>
                <th>วันที่</th>
                <th>โอนเงินเวลา</th>
                <th>วิธีส่ง</th>
                <th>เงินที่ต้องจ่าย</th>
                <th>เงินที่โอน</th>
                <th>ภาพสลิป</th>
                <th>สินค้าในตะกร้า</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach($wait_listdata as $b_val){

                ?>

                <tr>
                    <td><strong><?=$b_val->cartID?></strong></td>
                    <td><?=date("d/m/Y เวลา h:m:s น",$b_val->date)?></td>
                    <td><?=$b_val->time?></td>
                    <td class="hidden cartid"><?=$b_val->cartID?></td>
                    <td class="hidden userid"><?=$b_val->user?></td>
                    <td><?=$b_val->sendby=='none' ? 'รับด้วยตัวเอง' : 'ส่ง EMS' ?></td>
                    <td><?=$b_val->price?> บาท</td>
                    <td><?=$b_val->money?> บาท</td>
                    <td>
                    <?php
                    if($b_val->bill_dir !== NULL){
                        ?>

                        <a class="bill_img" data-toggle="modal" data-target="#myModal" www='bill_img/<?=$b_val->bill_dir?>'>คลิ๊ก</a>


                    <?php
                    }else{
                    ?>

                        <p>ไม่มีข้อมูล</p>

                    <?php
                    }
                    ?>
                    </td>
                    <td>
                        <a class="badge basket_detail" data-toggle="modal" data-target="#modal_basketdata">รายละเอียด</a>
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


<div class="col-xs-12 card margintop">
    <div class="cardbrand">รายการที่แอดมินดำเนินการแล้ว</div>
    <div class="col-xs-12 margintop">

        <?php

        if(count($wait_listdatay)){

        ?>

        <table class="table">

            <thead class="bluethead">
            <tr>
                <th>รหัสการสั่งซื้อ</th>
                <th>วันที่</th>
                <th>โอนเงินเวลา</th>
                <th>วิธีส่ง</th>
                <th>เงินที่ต้องจ่าย</th>
                <th>เงินที่โอน</th>
                <th>ภาพสลิป</th>
                <th>สินค้าในตะกร้า</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach($wait_listdatay as $b_val){
                ?>

                <tr>
                    <td><strong><?=$b_val->cartID?></strong></td>
                    <td><?=date("d/m/Y เวลา h:m:s น",$b_val->date)?> </td>
                    <td><?=$b_val->time?> </td>
                    <td class="hidden cartid"><?=$b_val->cartID?> </td>
                    <td class="hidden userid"><?=$b_val->user?> </td>
                    <td><?=$b_val->sendby=='none' ? 'รับด้วยตัวเอง' : 'ส่ง EMS' ?></td>
                    <td><?=$b_val->price?> บาท</td>
                    <td><?=$b_val->money?> บาท </td>
                    <td>
                    <?php

                    if($b_val->bill_dir !== NULL){

                    ?>
                        <a class="bill_img" data-toggle="modal" data-target="#myModal" www='bill_img/<?=$b_val->bill_dir?>'>คลิ๊ก</a>
                    <?php

                    }else{

                    ?>
                        <p>ไม่มีข้อมูล</p>
                    <?php

                    }

                    ?>
                    </td>
                    <td>
                        <a class="badge basket_detail" data-toggle="modal" data-target="#modal_basketdata">รายละเอียด</a>
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

<!--/////////////////////////////////////////////////-->

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!--/////////////////////////////////////////////////-->

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