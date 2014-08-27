<div class="col-xs-12 bigheader">
        ยืนยันข้อมูลการซื้อ
</div>

<div class="col-xs-12 card">

    <div class="cardbrand">รายการ</div>
    <div class="col-xs-12 margintop">
        <ul class="list-group list_data">
            <?php
            foreach($wait_listdata as $b_val){
            ?>

            <li class="list-group-item">
                <?=$b_val->username?> /
                <?=$b_val->money?> บาท /
                <?=date("d-m-Y",$b_val->date)?> /
                <?=$b_val->time?> /
                <?php
                    if($b_val->bill_dir !== NULL){
                ?>
                    <a target="_blank" href="../bill_img/<?=$b_val->bill_dir?>">ภาพสลิป</a>
                    <a href="">รายละเอียด</a>
                <?php
                }
                ?>
                <a class="badge">ยืนยันการซื้อ</a>
            </li>

            <?php
            }
            ?>

        </ul>
    </div>

</div>