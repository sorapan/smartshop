<div class="bigheader">
    ดาวน์โหลดไฟล์
</div>
<div class="card">
<div class="cardbrand">
    รายการไฟล์
</div>
    <table class="table-bordered table table-condensed margintop">
        <thead class="bluethead">
            <tr>
                <th>รายละเอียด</th>
                <th>ดาวน์โหลด</th>
                <th>อัพโหลดวันที่</th>
            </tr>
        </thead>
        <tbody>
        <?php

        foreach($filedata as $val){

        ?>
            <tr>
                <td class="file_id hidden"><?=$val->id?></td>
                <td class="file_name hidden"><?=$val->file?></td>
                <td><?=$val->detail?></td>
                <td><span style="float:left;max-width: 180px;overflow-x: hidden;text-overflow: ellipsis">
                        <a target="_blank" href='<?=base_url()?>download/downloadfile/<?=$val->file?>'>ดาวน์โหลด</a></span></td>
                <td><?=date('d/m/Y',$val->date)?></td>
            </tr>
        <?php

        }

        ?>
        </tbody>
    </table>
</div>