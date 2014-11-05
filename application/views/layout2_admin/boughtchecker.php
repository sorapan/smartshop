<div class="bigheader">ตรวจสอบการซื้อสินค้า</div>
<div class="card">
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
        <tbody>
        <?php
        foreach($boughtlist_data as $bval){
        ?>
            <tr>
                <td class="boughtlist_id"><?=$bval->id?></td>
                <td><?=$bval->username?></td>
                <td class="hidden user_id"><?=$bval->user?></td>
                <td><?=$bval->price?></td>
                <td><?=$bval->sendby == 'none'? 'รับด้วยตัวเอง' : 'ส่ง EMS' ?></td>
                <td><?=$bval->verified == 'Y'? 'ใช่' : 'ไม่' ?></td>
                <td>
                <?php

                    if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null){ echo '<span style="color:red">';}
                    else if($bval->cash != null && $bval->verified != 'Y'){echo '<span style="color:orange">';}
                    else if($bval->cash != null && $bval->verified == 'Y'){echo '<span style="color:green">'; }
                    else{echo '<span style="color:black">'; }
                    echo  floor((time() - $bval->date)/86400).' วันที่แล้ว';
                    if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null || $bval->cash != null && $bval->verified != 'Y'){ echo '</span>';}

                ?>
                </td>
                <td>
                <?php

                    if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null){ echo '<span style="color:red">';}
                    else if($bval->cash != null && $bval->verified != 'Y'){echo '<span style="color:orange">';}
                    else if($bval->cash != null && $bval->verified == 'Y'){echo '<span style="color:green">'; }
                    else{echo '<span style="color:black">'; }
                    echo $bval->cash == null ? 'ยังไม่ได้โอน' : 'โอนแล้ว';
                    if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null || $bval->cash != null && $bval->verified != 'Y'){ echo '</span>';}

                ?>
                </td>
                <td>
                <?php
                    if(floor((time() - $bval->date)/86400) > 7 && $bval->cash == null){

                        echo '<button class="btn yellowbutton col-xs-12 delete_boughtlist">ลบ</button>';

                    }else if($bval->cash != null && $bval->verified != 'Y'){

                        echo '<button class="btn yellowbutton col-xs-12 delete_boughtlist">ลบ</button>';

                    }
                ?>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>