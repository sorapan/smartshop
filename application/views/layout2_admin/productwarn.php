<div class="bigheader">
    สินค้าใกล้หมด
</div>
<div class="card">

    <div class="cardbrand">
        รายชื่อสินค้าที่ใกล้หมด
    </div>

    <table class="table table-bordered">
        <thead class="bluethead">
            <tr>
                <th>ชื่อสินค้า</th>
                <th>จำนวนตอนนี้ (ชิ้น)</th>
            </tr>
        </thead>
        <tbody>
        <?php

        foreach($alldata as $key=>$val){

        ?>
            <tr>
                <td><?=$val->name?></td>
                <td><?=$val->unit?></td>
            </tr>
        <?php

        }

        ?>
        </tbody>
    </table>

</div>