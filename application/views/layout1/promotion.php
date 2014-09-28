<div class="bigheader">
    โปรโมชั่น
</div>

<div class="card">

    <div class="cardbrand">
        รายการโปรโมชั่น
    </div>

    <table class="table">
        <thead><tr>
            <th>#</th>
            <th>ชื่อโปรโมชั่น</th>
            <th>รายชื่อสินค้า</th>
            <th>ราคา</th>
            <th>รายละเอียด</th>
        </tr></thead>
        <tbody>
        <?php

        foreach($promotionlist as $promval){
        ?>

            <tr>
                <td><?=$promval->id?></td>
                <td><?=$promval->promotion_name?></td>
                <td><?=$promval->id?></td>
                <td><?=$promval->price?></td>
                <td><?=$promval->detail?></td>
            </tr>

        <?php

        print_r($promval->promotiondata);

        }

        ?>

        </tbody>
    </table>

</div>