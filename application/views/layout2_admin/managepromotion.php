
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
                <td><button class="btn bluebutton deletepromotion">ลบ</button></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

</div>
